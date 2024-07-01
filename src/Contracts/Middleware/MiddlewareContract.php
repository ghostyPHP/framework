<?php

namespace Ghosty\Framework\Contracts\Middleware;

use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;

interface MiddlewareContract
{
    public function dispatch(MiddlewareBagContract $middlewares): void;
}
