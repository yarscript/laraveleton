<?php


namespace Umx\Core;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Tree
{

    /**
     * Contains tree item
     *
     * @var array
     */
    public $items = [];

    /**
     * Contains acl roles
     *
     * @var array
     */
    public $roles = [];

    /**
     * Contains current item route
     *
     * @var string
     */
    public $current;

    /**
     * Contains current item key
     *
     * @var string
     */
    public $currentKey;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->current = Request::url();
    }

    /**
     * Shortcut method for create a Config with a callback.
     * This will allow you to do things like fire an event on creation.
     *
     * @param callable $callback Callback to use after the Config creation
     * @return object
     */
    public static function create($callback = null)
    {
        $tree = new \Umx\Core\Tree();

        if ($callback) {
            $callback($tree);
        }

        return $tree;
    }

    /**
     * Add a Config item to the item stack
     *
     * @param string[] $item
     * @return void
     */
    public function add(array $item, $type = '')
    {
        $item[ 'children' ] = [];
        $item[ 'name' ] = trans($item[ 'name' ]);

        if ($type == 'menu') {
            $item[ 'url' ] = $this->getItemUrl($item);

            if (strpos($this->current, $item[ 'url' ]) !== false) {
                $this->currentKey = $item[ 'key' ];
            }
        } elseif ($type == 'acl') {
            $this->roles[ $item[ 'route' ] ] = $item[ 'key' ];
        }

        $children = str_replace('.', '.children.', $item[ 'key' ]);

        core()->array_set($this->items, $children, $item);
    }

    /**
     * Method to find the active links
     *
     * @param array $item
     * @return string|void
     */
    public function getActive(array $item)
    {
        $url = trim($item[ 'url' ], '/');

        if ((strpos($this->current, $url) !== false) || (strpos($this->currentKey, $item[ 'key' ]) === 0)) {
            return 'active';
        }
    }

    /**
     * Modified function to make routing from menu be more flexible
     *
     * @param array $item
     * @return mixed|string
     */
    private function getItemUrl(array $item)
    {
        if (isset($item[ 'route' ]) && Route::has($item[ 'route' ])) {
            return route($item[ 'route' ], $item[ 'params' ] ?? []);
        }

        return $item[ 'route' ] ?? '##';
    }

    /**
     * @param array $array
     * @param string $key
     * @param string|int|float $value
     *
     * @return array|float|int|string
     */
    public function array_set(array &$array, string $key, $value)
    {
        if (is_null($key)) {
            return $array = $value;
        }

        $keys = explode('.', $key);
        $count = count($keys);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if (!isset($array[ $key ]) || !is_array($array[ $key ])) {
                $array[ $key ] = [];
            }

            $array = &$array[ $key ];
        }

        $finalKey = array_shift($keys);

        if (isset($array[ $finalKey ])) {
            $array[ $finalKey ] = $this->arrayMerge($array[ $finalKey ], $value);
        } else {
            $array[ $finalKey ] = $value;
        }

        return $array;
    }

    /**
     * @param array $array1
     * @param array $array2
     *
     * @return array
     */
    protected function arrayMerge(array &$array1, array &$array2): array
    {
        $merged = $array1;

        foreach ($array2 as $key => &$value) {
            if (is_array($value) && isset($merged[ $key ]) && is_array($merged[ $key ])) {
                $merged[ $key ] = $this->arrayMerge($merged[ $key ], $value);
            } else {
                $merged[ $key ] = $value;
            }
        }

        return $merged;
    }
}