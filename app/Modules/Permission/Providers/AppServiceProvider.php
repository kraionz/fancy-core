<?php

namespace App\Modules\Permission\Providers;

use App\Modules\Core\Supports\Helper;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $router = $this->app['router'];
        $this->app->register(AuthServiceProvider::class);
        //$router->aliasMiddleware('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
        //$router->aliasMiddleware('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

    }
}
