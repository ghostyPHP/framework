<?php

namespace Ghosty\Framework\Support\Facades;

use Ghosty\Framework\Contracts\Routing\RouteContract;

/**
 * @method static \Ghosty\Framework\Support\Facades\Route get(string $url)
 * @method static \Ghosty\Framework\Support\Facades\Route post(string $url)
 * @method \Ghosty\Framework\Support\Facades\Route controller(string $controller)
 * @method \Ghosty\Framework\Support\Facades\Route action(string $action)
 * @method \Ghosty\Framework\Support\Facades\Route middleware(string|array $middleware)
 */

class Route extends Facade
{
    protected static function getFacadeName()
    {
        return RouteContract::class;
    }
}
