<?php

namespace Umx\Core;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class Core
{
    /**
     * Method to sort through the acl items and put them in order
     *
     * @param array $items
     *
     * @return array
     */
    public function sortItems(array $items): array
    {
        foreach ($items as &$item) {
            if (count($item[ 'children' ])) {
                $item[ 'children' ] = $this->sortItems($item[ 'children' ]);
            }
        }

        usort($items, function ($a, $b) {
            if (!isset($a[ 'sort' ]) || !isset($b[ 'sort' ])) {
                return 0;
            }
            if ($a[ 'sort' ] === $b[ 'sort' ]) {
                return 0;
            }

            return ($a[ 'sort' ] < $b[ 'sort' ]) ? -1 : 1;
        });

        return $this->convertToAssociativeArray($items);
    }

    /**
     * @param string $fieldName
     *
     * @return array
     */
    public function getConfigField(string $fieldName): array
    {
        foreach (config('core') as $coreData) {
            if (isset($coreData[ 'fields' ])) {
                foreach ($coreData[ 'fields' ] as $field) {
                    $name = $coreData[ 'key' ] . '.' . $field[ 'name' ];

                    if ($name == $fieldName) {
                        return $field;
                    }
                }
            }
        }
    }

    /**
     * @param array $items
     *
     * @return array
     */
    public function convertToAssociativeArray(array $items): array
    {
        foreach ($items as $key1 => $level1) {
            unset($items[ $key1 ]);
            $items[ $level1[ 'key' ] ] = $level1;

            if (count($level1[ 'children' ])) {
                foreach ($level1[ 'children' ] as $key2 => $level2) {
                    $temp2 = explode('.', $level2[ 'key' ]);
                    $finalKey2 = end($temp2);
                    unset($items[ $level1[ 'key' ] ][ 'children' ][ $key2 ]);
                    $items[ $level1[ 'key' ] ][ 'children' ][ $finalKey2 ] = $level2;

                    if (count($level2[ 'children' ])) {
                        foreach ($level2[ 'children' ] as $key3 => $level3) {
                            $temp3 = explode('.', $level3[ 'key' ]);
                            $finalKey3 = end($temp3);
                            unset($items[ $level1[ 'key' ] ][ 'children' ][ $finalKey2 ][ 'children' ][ $key3 ]);
                            $items[ $level1[ 'key' ] ][ 'children' ][ $finalKey2 ][ 'children' ][ $finalKey3 ] =
                                $level3;
                        }
                    }

                }
            }
        }

        return $items;
    }

    /**
     * @param array $items
     * @param string $key
     * @param string|int|float $value
     *
     * @return array
     */
    public function array_set(array &$array, string $key, $value): array
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

    /**
     * @param array $array1
     *
     * @return array
     */
    public function convertEmptyStringsToNull(array $array): array
    {
        foreach ($array as $key => $value) {
            if ($value == "" || $value == "null") {
                $array[ $key ] = null;
            }
        }

        return $array;
    }

    /**
     * Create singletom object through single facade
     *
     * @param string $className
     *
     * @return object
     */
    public function getSingletonInstance(string $className): object
    {
        static $instance = [];

        if (array_key_exists($className, $instance)) {
            return $instance[ $className ];
        }

        return $instance[ $className ] = app($className);
    }

    /**
     * Returns a string as selector part for identifying elements in views
     *
     * @param float $taxRate
     *
     * @return string
     */
    public static function taxRateAsIdentifier(float $taxRate): string
    {
        return str_replace('.', '_', (string)$taxRate);
    }
}
