<?php

namespace Ghosty\Framework\Routing;

use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\Routing\Contracts\RouterContract as ContractsRouterContract;
use Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract;
use Ghosty\Component\Routing\Router as RoutingRouter;
use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\Routing\RouterContract;
use Ghosty\Framework\Support\Facades\Config;

class Router implements RouterContract
{
    public function __construct(private RequestContract $request)
    {
    }

    public function createRouter(): ContractsRouterContract
    {
        $this->loadRoutes();
        $routeStack = Config::get('routing', 'return_routes', false) ? $this->loadRoutes() : Container::make(\Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract::class);

        return new RoutingRouter($this->request, $routeStack);
    }

    private function loadRoutes(): void
    {
        require_once APP_PATH . '/' . Config::get('routing', 'routes', '/routes/api.php');
    }
}
