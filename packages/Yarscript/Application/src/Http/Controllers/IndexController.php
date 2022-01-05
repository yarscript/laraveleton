<?php

namespace Yarscript\Application\Http\Controllers;

use Yarscript\Core\Http\Controllers\Controller as BaseController;

class IndexController extends BaseController
{
    /**
     * @var array|null
     */
    protected ?array $_config;

    public function __construct()
    {
        $this->_config = request('request_config');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->_config['view']);
    }
}
