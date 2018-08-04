<?php

namespace App\Modules\Core\Module;

use Illuminate\Support\Facades\Facade;

class ModuleFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'module';
    }
}
