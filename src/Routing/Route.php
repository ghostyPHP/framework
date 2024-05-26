<?php

namespace Ghosty\Routing;

use Ghosty\Contracts\Routing\RouteContract;

class Route implements RouteContract
{

    private array $routes;

    private function new()
    {
        $this->routes[] = [];
    }


    private function addField(string $filed, string $value)
    {
        $this->routes[array_key_last($this->routes)][$filed] = $value;
    }


    public function getRoutes(): array
    {
        return $this->routes;
    }


    public function get(string $url): Route
    {
        $this->new();
        $this->routes[array_key_last($this->routes)]['method'] = 'GET';
        $this->routes[array_key_last($this->routes)]['url'] = $url;

        return $this;
    }


    public function post(string $url): Route
    {
        $this->new();
        $this->addField('method', 'POST');
        $this->addField('url', $url);

        return $this;
    }


    public function controller(string $controller): Route
    {
        $this->addField('controller', $controller);

        return $this;
    }


    public function action(string $action): Route
    {
        $this->addField('action', $action);

        return $this;
    }
}
