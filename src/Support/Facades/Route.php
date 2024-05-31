<?php

namespace Ghosty\Support\Facades;

use Ghosty\Contracts\Routing\RouteContract;

/**
 * @method static \Ghosty\Support\Facades\Route get(string $url)
 * @method static \Ghosty\Support\Facades\Route post(string $url)
 * @method static \Ghosty\Support\Facades\Route controller(string $controller)
 * @method static \Ghosty\Support\Facades\Route action(string $action)
 */

class Route extends Facade
{
    protected static function getFacadeName()
    {
        return RouteContract::class;
    }
}
