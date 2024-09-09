<?php

namespace Ghosty\Framework\Routing;

use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\Routing\Contracts\RouterContract;
use Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract;
use Ghosty\Component\Routing\Router as RoutingRouter;
use Ghosty\Component\Routing\Stacks\RouteStack;
use Ghosty\Container\Binding;
use Ghosty\Framework\Container\Container;
use Ghosty\Framework\Foundation\Application;

class Router
{
    public function create(RequestContract $request): RouterContract
    {
        Container::bind(RouteStackContract::class, (new Binding(RouteStack::class))->singleton());
        $this->laodRoutes();
        return new RoutingRouter($request, Container::make(RouteStackContract::class));
    }

    private function laodRoutes(): void
    {
        require_once Container::make(Application::class)->getRoutePath();
    }
}
