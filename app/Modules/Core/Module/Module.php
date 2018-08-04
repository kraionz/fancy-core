<?php namespace App\Modules\Core\Module;

use App\Modules\Core\Contracts\Core;
use Illuminate\Filesystem\Filesystem;

class Module extends Core
{
    /**
     * AppServiceProvider.
     *
     * @var $provider
     */
    public $provider;

    /**
     * Filesystem.
     *
     * @var $files
     */
    protected $files;

    /**
     * @param null $module
     */
    public function __construct($module = null)
    {
        $this->files = new Filesystem;
        $this->path = config('module.path').'/' .$module;
        $this->namespace = config('module.namespace').'\\'.$module;
        $this->load();
    }

    /**
     * {@inheritdoc}
     */
    protected function read()
    {
        $modulePath = $this->path.'/'. config('module.config.name');
        $changelogPath = $this->path.'/'. config('module.config.changelog');

        $content = null;

        if(file_exists($modulePath)){

            $content  = json_decode($this->files->get($modulePath), true);

            $this->provider = $this->namespace.'\\'.$content['provider'];
        }

        if(file_exists($modulePath)){

            $this->changelog  = json_decode($this->files->get($changelogPath), true);
        }

        return $content;
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $data)
    {
        $path = $this->path.'/'. config('module.config.name');

        if ($data) {
            $contents = json_encode($data,JSON_PRETTY_PRINT);
        } else {
            $contents = '{}';
        }

        $this->files->put($path, $contents);
    }
}
