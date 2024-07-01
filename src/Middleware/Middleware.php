<?php

namespace Ghosty\Framework\Middleware;

use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;
use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\Middleware\MiddlewareContract;
use Ghosty\Framework\Exceptions\Middleware\MiddlewareDoesNotExistException;

class Middleware implements MiddlewareContract
{
    public function dispatch(MiddlewareBagContract $middlewares): void
    {
        foreach ($middlewares->all() as $middleware)
        {
            if (!class_exists($middleware))
            {
                throw new MiddlewareDoesNotExistException($middleware);
            }
            Container::make($middleware);
        }
    }
}
