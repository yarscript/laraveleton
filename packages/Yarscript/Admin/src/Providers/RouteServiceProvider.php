<?php

namespace Yarscript\Admin\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 *
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Yarscript\Admin\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
//        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
//        Route::model('page', Page::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $admin_conf_key = config('app.admin_conf_key');
        Route::prefix($admin_conf_key)
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->as($admin_conf_key . '.')
             ->group(__DIR__ . '/../Http/routes.php');
    }
}
