<?php

namespace Ghosty\Framework\Support\Facades;

use Ghosty\Framework\Container\Container;
use Ghosty\Framework\Exceptions\Support\Facades\FacadeDoesNotExistsException;
use Ghosty\Framework\Exceptions\Support\Facades\FacadeDoesNotImplementMethodException;

abstract class Facade
{
    protected static function getFacadeAccessor()
    {
        throw new FacadeDoesNotImplementMethodException(static::class);
    }

    public static function __callStatic($name, $arguments)
    {
        if (!class_exists(static::getFacadeAccessor()))
        {
            throw new FacadeDoesNotExistsException(static::class);
        }

        return Container::make(static::getFacadeAccessor())->$name(...$arguments);
    }
}
