<?php

namespace Ghosty\Framework\Support\Facades;

/**
 * @method static self get(string $uri) Create new route with GET method and $uri URI
 * @method static self post(string $uri) Create new route with POST method and $uri URI
 * @method static self put(string $uri) Create new route with PUT method and $uri URI
 * @method static self patch(string $uri) Create new route with PATCH method and $uri URI
 * @method static self delete(string $uri) Create new route with DELETE method and $uri URI
 * @method static self options(string $uri) Create new route with OPTIONS method and $uri URI
 * @method static self controller(string $controller) Set controller to last created route
 * @method static self action(string $action) Set action to last created route
 * @method static self parameters(\Ghosty\Component\Routing\Contracts\Bags\ParameterBagContract|array $parameters) Set parameters to last created route
 * @method static self middlewares(\Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract|array $middlewares) Set middlewares to last created route
 */
class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ghosty\Framework\Routing\CreateRoute::class;
    }
}
