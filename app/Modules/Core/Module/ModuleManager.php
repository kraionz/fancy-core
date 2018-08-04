<?php

namespace App\Modules\Core\Module;

use App\Modules\Core\Contracts\Driver;
use Illuminate\Filesystem\Filesystem;

class ModuleManager extends Driver
{
    /**
     * Modules Root Path.
     *
     * @var string
     */
    protected $path;

    /**
     * Filesystem.
     *
     * @var $files
     */
    protected $files;

    /**
     * Module constructor.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
        $this->path = config('module.path');
        $this->load();
    }

    /**
     * {@inheritdoc}
     */
    protected function read()
    {
        $directories = scandir($this->path);
        $modules = [];

        foreach ($directories as $key => $module){
            $file = $this->path.'/' .$module . '/' . config('module.config.name');
            if(file_exists($file)){
                $modules[$module] = new Module($module);
            }
        }

        return $modules;
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $data){}
}
