<?php

namespace Yarscript\Admin\Providers;

use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Yarscript\Admin\Http\Middleware\Bouncer as BouncerMiddleware;

/**
 *
 */
class AdminServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
//        /* publishers */
        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('admin/assets'),
        ]);

        /* loaders */
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'admin');

        $this->app->register(RouteServiceProvider::class);


        /* Just a snippets */
//        View::composer(
//            ['admin::layouts.nav-left', 'admin::layouts.nav-aside', 'admin::layouts.tabs'],
//            fn($view) => $view->with('menu', $sidenavMenuConf)
//        );

//        View::composer('admin::texts.*', function ($view) {
//            $page = explode('/', $this->app->request->getRequestUri())[ 3 ];
//            return $view->with('page', $page);
//        });

//        ViewFacade::composer('admin::products.form', SizeComposer::class);
//
//        ViewFacade::composer([
//            'admin::products.form',
//            'admin::material.index'
//        ], MaterialComposer::class);

    }

    /**
     *
     */
    public function register()
    {
        //
    }
}
