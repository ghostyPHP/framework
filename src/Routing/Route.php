<?php

namespace Ghosty\Routing;

use Ghosty\Contracts\Routing\RouteContract;
use Ghosty\Foundation\Routing\Route as RoutingRoute;
use Ghosty\Foundation\Routing\RouteList;

class Route implements RouteContract
{
    private RouteList $RouteList;


    public function __construct()
    {
        $this->RouteList = new RouteList;
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
