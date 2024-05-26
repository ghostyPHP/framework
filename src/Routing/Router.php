<?php

namespace Ghosty\Routing;

use Exception;
use Ghosty\Contracts\Foundation\Http\RequestContract;
use Ghosty\Contracts\Foundation\Routing\RouteContract as RoutingRouteContract;
use Ghosty\Contracts\Routing\RouteContract;
use Ghosty\Routing\RouteNotFoundExeption;
use Ghosty\Contracts\Routing\RouterContract;
use Ghosty\Foundation\Application;
use Ghosty\Foundation\Http\Request as HttpRequest;
use Ghosty\Foundation\Routing\Route;
use Ghosty\Foundation\Routing\RouteList;
use Ghosty\Http\Request;

class Router implements RouterContract
{
    private RouteList $RouteList;

    public function __construct(private RouteContract $Route)
    {
        $this->RouteList = $this->Route->getRoutes();
    }



    public function dispatch()
    {
        $GLOBALS['Route'] = $this->determine();
    }



    private function determine()
    {
        while (true)
        {
            try
            {
                $Route = $this->RouteList->pop();
                if ($this->validateRoute($Route))
                {
                    return $Route;
                }
            }
            catch (Exception $e)
            {
                throw new RouteNotFoundExeption('Route ' . Request::url() . ' not found');
            }
        }
    }


    private function validateRoute(Route $route)
    {
        return $this->validateRouteByMethod($route) && $this->validateRouteByUrl($route);
    }



    private function validateRouteByUrl(Route $route)
    {
        $splitedUrl = explode('/', Request::url());
        $splitedRouteUrl = explode('/', $route->getUrl());

        if (count($splitedUrl) != count($splitedRouteUrl))
        {
            return false;
        }


        foreach ($splitedRouteUrl as $splitedRouteUrlKey => $splitedRouteUrlEl)
        {
            if ($splitedRouteUrlEl[0] == '{' && $splitedRouteUrlEl[strlen($splitedRouteUrlEl) - 1] == '}')
            {
                continue;
            }

            if ($splitedUrl[$splitedRouteUrlKey] != $splitedRouteUrlEl)
            {
                return false;
            }
        }

        return true;
    }





    private function validateRouteByMethod(Route $route)
    {
        return $route->getMethod() == Request::method();
    }
}
