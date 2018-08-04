<?php

namespace App\Modules\Core\Module;

use App\Modules\Core\Module\Console\Commands\MakeModule;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\AliasLoader;
use App\Modules\Core\Support\Helper;
use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Filesystem.
     *
     * @var $files
     */
    protected $files;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();

        $this->files = new Filesystem;

        $modules = ModuleFacade::all();

        foreach ($modules as $module) {

            if($module->get('core') || $module->get('active')){

                $this->app->register($module->provider);

                $this->loads($module);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishConfig();
        $this->registerModule();
        AliasLoader::getInstance()->alias('Module', ModuleFacade::class);
    }

    /**
     * Load files Module.
     *
     * @param $module
     * @return void
     */
    public function loads($module)
    {
        $name = strtolower($module->get('module'));

        $config = $module->path.'/Common/config/'.$name.'.php';
        $helper = $module->path.'/Common/helpers';
        $views  = $module->path.'/Common/resources/views';
        $trans  = $module->path.'/Common/resources/lang';
        $migrations  = $module->path.'/Common/database/migrations';
        $router  = $module->path.'/Common/routes';

        if ($this->files->isDirectory($router)) {
            $this->app->register($module->namespace.'\Providers\RouteServiceProvider');
        }
        if ($this->files->exists($config)) {
            $this->mergeConfigFrom($config, $name);
        }
        if ($this->files->isDirectory($helper)) {
            Helper::autoload($helper);
        }
        if ($this->files->isDirectory($views)) {
            $this->loadViewsFrom($views, str_plural($name));
        }
        if ($this->files->isDirectory($trans)) {
            $this->loadTranslationsFrom($trans, str_plural($name));
        }
        if ($this->files->isDirectory($migrations)) {
            $this->loadMigrationsFrom($migrations);
        }

    }

    /**
     * Register Modules.
     *
     * @return void
     */

    public function registerModule()
    {
        $this->app->singleton('module', function ($app) {
            $module = new ModuleManager($app['files']);
            return $module;
        });
    }


    /**
     * Publish config file.
     *
     * @return void
     */
    public function publishConfig()
    {
        $configPath = realpath(__DIR__.'../../Common/config/module.php');
        $this->mergeConfigFrom($configPath, 'module');
    }

    /**
     * Register Commands.
     *
     * @return void
     */
    public function registerCommands(){
        $this->commands([
            MakeModule::class,
        ]);
    }


}
