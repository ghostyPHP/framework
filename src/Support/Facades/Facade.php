<?php

namespace Ghosty\Support\Facades;

class Facade
{
    public static function __callStatic($name, $arguments)
    {
        $instance = Container::make(static::getFacadeName());

        return $instance->$name(...$arguments);
    }


    public function __call($name, $arguments)
    {
        $instance = Container::make(static::getFacadeName());

        return $instance->$name(...$arguments);
    }
}
