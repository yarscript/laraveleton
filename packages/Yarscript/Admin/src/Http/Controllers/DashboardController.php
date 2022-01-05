<?php

namespace Yarscript\Admin\Http\Controllers;

use Yarscript\Core\Http\Controllers\Controller as BaseController;

/**
 * Class DashboardController
 * @package Yarscript\Admin\Http\Controllers
 */
class DashboardController extends BaseController
{
    /**
     * @var array|null
     */
    protected ?array $request_config;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->request_config = request('request_config');
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $component = 'home';

        return view($this->request_config[ 'view' ], compact('component'));
    }
}
