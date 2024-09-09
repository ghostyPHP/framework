<?php

namespace Ghosty\Framework\Routing;

use Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract;
use Ghosty\Component\Routing\Route;
use Ghosty\Framework\Container\Container;
use Ghosty\Component\Routing\Bags\MiddlewareBag;
use Ghosty\Component\Routing\Bags\ParameterBag;
use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;
use Ghosty\Component\Routing\Contracts\Bags\ParameterBagContract;

class CreateRoute
{
    public function get(string $uri): self
    {
        Container::make(RouteStackContract::class)->push(new Route("GET", $uri));

        return $this;
    }

    public function post(string $uri): self
    {
        Container::make(RouteStackContract::class)->push(new Route("POST", $uri));

        return $this;
    }

    public function put(string $uri): self
    {
        Container::make(RouteStackContract::class)->push(new Route("PUT", $uri));

        return $this;
    }

    public function patch(string $uri): self
    {
        Container::make(RouteStackContract::class)->push(new Route("PATCH", $uri));

        return $this;
    }

    public function delete(string $uri): self
    {
        Container::make(RouteStackContract::class)->push(new Route("DELETE", $uri));

        return $this;
    }

    public function options(string $uri): self
    {
        Container::make(RouteStackContract::class)->push(new Route("OPTIONS", $uri));

        return $this;
    }

    public function controller(string $controller): self
    {
        Container::make(RouteStackContract::class)->top()->setController($controller);

        return $this;
    }

    public function action(string $action): self
    {
        Container::make(RouteStackContract::class)->top()->setAction($action);

        return $this;
    }

    public function parameters(ParameterBagContract|array $parameters): self
    {
        if (is_array($parameters))
        {
            $parameters = new ParameterBag($parameters);
        }
        Container::make(RouteStackContract::class)->top()->setParametersBag($parameters);

        return $this;
    }

    public function middlewares(MiddlewareBagContract|array $middlewares): self
    {
        if (is_array($middlewares))
        {
            $middlewares = new MiddlewareBag($middlewares);
        }

        Container::make(RouteStackContract::class)->top()->setMiddlewaresBag($middlewares);

        return $this;
    }
}
