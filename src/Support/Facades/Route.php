<?php

namespace Ghosty\Framework\Support\Facades;

use Ghosty\Framework\Contracts\Routing\RouteContract;

/**
 * @method static \Ghosty\Support\Facades\Route get(string $url)
 * @method static \Ghosty\Support\Facades\Route post(string $url)
 * @method \Ghosty\Support\Facades\Route controller(string $controller)
 * @method \Ghosty\Support\Facades\Route action(string $action)
 * @method \Ghosty\Support\Facades\Route middleware(string|array $middleware)
 */

class Route extends Facade
{
    protected static function getFacadeName()
    {
        return RouteContract::class;
    }
}
