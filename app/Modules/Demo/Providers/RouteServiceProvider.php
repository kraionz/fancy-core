<?php

namespace App\Modules\Demo\Providers;

//use App\Modules\Core\Traits\RoutesTrait;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{
    //use RoutesTrait;

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    public $namespace = 'App\Modules\Demo\Http\Controllers';

    /**
     * This dir is applied to your modules routes.
     *
     * @var string
     */
    public $dir = __DIR__;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

}
