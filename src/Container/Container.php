<?php

namespace Ghosty\Framework\Container;

/**
 * @method static mixed make(string $abstract, array $args = []) Resolve class from container with args
 * @method static void bind(string $id, string $concrete) Bind new class
 * @method static \Ghosty\Container\Contracts\ContainerContract getInstance() Get container instance
 * @method static mixed get(string $abstract) Finds an entry of the container by its identifier and returns it.
 */

class Container
{
    public static function __callStatic($name, $arguments)
    {
        return \Ghosty\Container\Facades\Container::$name(...$arguments);
    }
}
