<?php

namespace Ghosty\Framework\Contracts\Routing;

use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;
use Ghosty\Component\Routing\Contracts\Bags\ParameterBagContract;

interface CreateRouteContract
{
    public function get(string $uri): self;

    public function post(string $uri): self;

    public function put(string $uri): self;

    public function patch(string $uri): self;

    public function delete(string $uri): self;

    public function options(string $uri): self;

    public function controller(string $controller): self;

    public function action(string $action): self;

    public function parameters(ParameterBagContract|array $parameters): self;

    public function middlewares(MiddlewareBagContract|array $middlewares): self;
}
