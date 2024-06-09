<?php

namespace Ghosty\Support;

use Ghosty\Support\Facades\File;

class Env
{
    public static function get(mixed $key, mixed $default = null)
    {
        $env = File::get(APP_PATH . '/.env');

        $env = explode("\n", $env);

        $envArray = [];

        foreach ($env as $envKey => $envValue)
        {
            if (!trim($envValue) == '' && str_contains($envValue, '='))
            {
                $envArray[strstr($envValue, '=', true)] = trim(substr(strstr($envValue, '='), 1));
            }
        }


        return array_key_exists($key, $envArray) ? $envArray[$key] : $default;
    }
}
