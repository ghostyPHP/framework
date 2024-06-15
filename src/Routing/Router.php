<?php

namespace Ghosty\Framework\Routing;

use Exception;
use Ghosty\Container\Container;
use Ghosty\Framework\Contracts\Http\RequestContract;
use Ghosty\Framework\Contracts\Routing\RouteContract;
use Ghosty\Framework\Routing\RouteNotFoundExeption;
use Ghosty\Framework\Contracts\Routing\RouterContract;
use Ghosty\Framework\Foundation\Routing\Route;
use Ghosty\Framework\Foundation\Routing\RouteList;
use Ghosty\Framework\Http\Request;
use Ghosty\Framework\Support\Facades\Request as FacadesRequest;

class Router implements RouterContract
{
    private RouteList $RouteList;


    public function __construct(private RouteContract $Route, private RequestContract $Request)
    {
        $this->RouteList = $this->Route->getRoutes();
    }



    public function dispatch()
    {
        $this->Request->setRoute($this->determine());
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
                throw new RouteNotFoundExeption('Route ' . FacadesRequest::url() . ' not found');
            }
        }
    }


    private function validateRoute(Route $route)
    {
        return $this->validateRouteByMethod($route) && $this->validateRouteByUrl($route);
    }



    private function validateRouteByUrl(Route $route)
    {
        $splitedUrl = explode('/', FacadesRequest::url());
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
        return $route->getMethod() == $this->Request->method();
    }
}
