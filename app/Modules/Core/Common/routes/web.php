<?php

use Illuminate\Support\Str;

Route::get('/core', function () {

    $str = Str::studly('holas-Blaco');

//dd($str);
    $modules = module()->all();
    $module = module('Module');
    //$module->set(['name' => 'dffs']);
     //$module->save();
    dd($module);
    //return view('welcome');

});
