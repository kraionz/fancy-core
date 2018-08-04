<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module config name and change log file name
    |--------------------------------------------------------------------------
    |
    | Here is the config for module.json file and changelog
    | for version control status
    |
    */

    'config'     => [
        'name'      => 'module.json',
        'changelog' => 'changelog.json',
    ],


    /*
    |--------------------------------------------------------------------------
    | Database Config
    |--------------------------------------------------------------------------
    |
    | Here you can specify modules database settings
    |
    */
    'database' => [
        'table' => 'modules',
    ],

    /*
    |--------------------------------------------------------------------------
    | Modules path
    |--------------------------------------------------------------------------
    |
    | This path used for save the generated module. This path also will added
    | automatically to list of scanned folders.
    |
    */
    'path' => app_path('Modules'),

    /*
    |--------------------------------------------------------------------------
    | Modules namespace
    |--------------------------------------------------------------------------
    |
    | This is the default namespace for the modules
    |
    */
    'namespace' => 'App\Modules',

    /*
    |--------------------------------------------------------------------------
    | Theme Stubs
    |--------------------------------------------------------------------------
    |
    | Default theme stubs.
    |
    */
    'stubs'      => [
        'path'  => app_path('Modules/Core/Module/Console/stubs'),
        'files' => [
            'module'                => 'module.json',
            'changelog'             => 'changelog.json',
            'apiRoutes'             => 'Common/routes/api.php',
            'webRoutes'             => 'Common/routes/web.php',
            'adminRoutes'           => 'Common/routes/admin.php',
            'controller'            => 'Http/Controller/HomeController.php',
            'RouteServiceProvider'  => 'Providers/RouteServiceProvider.php',
            'AppServiceProvider'    => 'Providers/AppServiceProvider.php',
         ],
    ],

];
