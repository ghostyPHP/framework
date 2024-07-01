<?php

namespace Ghosty\Framework\Support\Facades;

/**
 * @method static mixed get(string $configFile, string $key, mixed $default) Get config value
 */
class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ghosty\Framework\Config\Config::class;
    }
}
