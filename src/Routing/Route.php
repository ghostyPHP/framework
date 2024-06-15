<?php

namespace Ghosty\Framework\Routing;

use Ghosty\Framework\Contracts\Routing\RouteContract;
use Ghosty\Framework\Foundation\Routing\Route as RoutingRoute;
use Ghosty\Framework\Foundation\Routing\RouteList;

class Route implements RouteContract
{


    public function __construct(private RouteList $RouteList)
    {
    }


    private function new()
    {
        $this->RouteList->push(new RoutingRoute);
    }


    public function getRoutes(): RouteList
    {
        return $this->RouteList;
    }


    public function get(string $url): Route
    {
        $this->new();
        $this->getLastRoute()->setMethod('GET');
        $this->getLastRoute()->setUrl($url);
        $this->getLastRoute()->setParameters($this->getParametersFromUrl($url));

        return $this;
    }



    public function post(string $url): Route
    {
        $this->new();
        $this->getLastRoute()->setMethod('POST');
        $this->getLastRoute()->setUrl($url);
        $this->getLastRoute()->setParameters($this->getParametersFromUrl($url));

        return $this;
    }


    public function controller(string $controller): Route
    {
        $this->getLastRoute()->setController($controller);

        return $this;
    }


    public function action(string $action): Route
    {
        $this->getLastRoute()->setAction($action);

        return $this;
    }





    public function middleware(string|array $middlewares): Route
    {
        if (!is_array($middlewares))
        {
            $middlewares = [$middlewares];
        }

        foreach ($middlewares as $middleware)
        {
            $this->getLastRoute()->addMiddleware($middleware);
        }

        return $this;
    }






    private function getParametersFromUrl(string $url)
    {
        $parameters = [];
        foreach (explode('/', $url) as $urlKey => $urlEl)
        {
            if ($urlEl[0] == '{' && $urlEl[strlen($urlEl) - 1] == '}')
            {
                $parameters[$urlEl] = $urlKey;
            }
        }

        return $parameters;
    }



    private function getLastRoute(): RoutingRoute
    {
        return $this->RouteList->top();
    }
}
