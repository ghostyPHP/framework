<?php

namespace Ghosty\Framework\Http\Middleware;

use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;
use Ghosty\Framework\Container\Container;
use Ghosty\Framework\Exceptions\Http\Middleware\MiddlewareDoesNotExistsException;

class Middleware
{
    public function dispatch(MiddlewareBagContract $middlewares): void
    {
        foreach ($middlewares->all() as $middleware)
        {
            if (!class_exists($middleware))
            {
                throw new MiddlewareDoesNotExistsException($middleware);
            }
            Container::make($middleware);
        }
    }
}
