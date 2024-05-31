<?php

namespace Ghosty\Http;

use Ghosty\Contracts\Http\RequestContract;
use Ghosty\Foundation\Routing\Route;

class Request implements RequestContract
{
    private Route $Route;

    public function url(): string
    {
        return substr($_SERVER['REQUEST_URI'], 1);
    }



    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }



    public function query(): array
    {
        return $_GET;
    }



    public function get(?string $param = null, ?string $default = null): string
    {
        return isset($_GET[$param]) ? $_GET[$param] : $default;
    }



    public function post(?string $param = null, ?string $default = null): string
    {
        return isset($_POST[$param]) ? $_POST[$param] : $default;
    }



    public function route(?string $param = null, ?string $default = null): string
    {
        $param = '{' . $param . '}';

        $parameters = $this->getRoute()->getParameters();

        if (!array_key_exists($param, $parameters))
        {
            return $default;
        }

        return explode('/', $this->url())[$parameters[$param]];
    }



    public function getRoute(): Route
    {
        return $this->Route;
    }



    public function setRoute(Route $route): void
    {
        $this->Route = $route;
    }
}
