<?php

namespace Ghosty\Support\Facades;

use Ghosty\Container\Container as ContainerContainer;

/**
 * @method static mixed make(string $abstract)
 * @method static void bind(string $abstract, string $concrete, bool $singleton)
 * @method static void singleton(string $abstract, string $concrete)
 * @method static bool has(string $abstract)
 */

class Container
{
    public static function __callStatic($name, $arguments)
    {
        return ContainerContainer::getInstance()->$name(...$arguments);
    }
}
