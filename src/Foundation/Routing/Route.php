<?php

namespace Ghosty\Framework\Foundation\Routing;

use Ghosty\Framework\Contracts\Foundation\Routing\RouteContract;

class Route implements RouteContract
{
    private string $url;

    private string $method;

    private string $controller;

    private string $action;

    private array $parameters = [];

    private array $middlewares = [];


    public function getUrl(): string
    {
        return $this->url;
    }


    public function getParameters(): array
    {
        return $this->parameters;
    }


    public function getMethod(): string
    {
        return $this->method;
    }


    public function getController(): string
    {
        return $this->controller;
    }


    public function getAction(): string
    {
        return $this->action;
    }


    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }



    public function setUrl(string $url)
    {
        $this->url = $url;
    }


    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }


    public function setMethod(string $method)
    {
        $this->method = $method;
    }


    public function setController(string $controller)
    {
        $this->controller = $controller;
    }


    public function setAction(string $action)
    {
        $this->action = $action;
    }


    public function addMiddleware(string $middleware)
    {
        $this->middlewares[] = $middleware;
    }
}
