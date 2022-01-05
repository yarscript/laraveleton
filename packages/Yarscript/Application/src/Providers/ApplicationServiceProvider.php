<?php

namespace Yarscript\Application\Providers;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class ApplicationServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        /* publishers */
        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('application/assets'),
        ], 'yarscript-app');


        /* loaders */
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', config('app.application_conf_key'));

        /* providers */
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     *
     */
    public function register()
    {

    }
}
