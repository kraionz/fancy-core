<?php

namespace App\Modules\Core\Module\Console\Commands;

use App\Modules\Core\Support\Stub;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Filesystem.
     *
     * @var $files
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->files = new Filesystem;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = config('module.path');
        $module = Str::studly($this->argument('name'));
        $modulePath = $path.'/'.$module;

        $name = $module;

        if ($this->files->isDirectory($modulePath)) {
            return $this->error('Sorry Boss '.$module.' Theme Folder Already Exist !!!');
        }

        $this->files->copyDirectory(__DIR__.'/../stubs/Module', $modulePath);


        foreach (config('module.stubs.files') as $key => $value)
        Stub::createFromPath(__DIR__.'/../stubs/'.$key.'.stub', compact('name'))
            ->saveTo($modulePath, $value)
        ;


        $this->info('Module created successfully.');
    }
}
