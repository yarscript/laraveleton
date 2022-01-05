<?php

namespace Yarscript\Core\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Umx\Core\Http\Middleware\ForceJsonResponse;

class CoreServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        include __DIR__ . '/../Http/helpers.php';

        $router->aliasMiddleware('forceJson', ForceJsonResponse::class);
    }

    public function register()
    {

    }
}
