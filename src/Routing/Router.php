<?php

namespace Ghosty\Routing;

use Ghosty\Contracts\Routing\RouteContract;
use Ghosty\Routing\RouteNotFoundExeption;
use Ghosty\Contracts\Routing\RouterContract;
use Ghosty\Foundation\Http\Request;

class Router implements RouterContract
{
    private array $routes;

    public function __construct(private RouteContract $Route)
    {
        $this->routes = $this->Route->getRoutes();
    }



    public function dispatch()
    {
        foreach ($this->routes as $route)
        {
            if ($route['url'] == Request::url() || $route['method'] == Request::method())
            {
                return true;
            }
        }

        throw new RouteNotFoundExeption("Route not found");
    }
}
