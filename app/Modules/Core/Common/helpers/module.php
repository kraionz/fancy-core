<?php

if (! function_exists('module')) {
    /**
     * Get / set the specified module  value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string $key
     * @param  mixed $default
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    function module($key = null, $default = null)
    {
        $module = app('module');

        if (is_null($key)) {
            return $module;
        }

        if (is_array($key)) {
            $module->set($key);

            return $module;
        }

        return $module->get($key, $default);
    }
}


