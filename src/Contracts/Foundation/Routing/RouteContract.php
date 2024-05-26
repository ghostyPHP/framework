<?php

namespace Ghosty\Contracts\Foundation\Routing;

interface RouteContract
{
    public function getUrl(): string;

    public function getParameters(): array;

    public function getMethod(): string;

    public function getController(): string;

    public function getAction(): string;


    public function setMethod(string $method);

    public function setUrl(string $url);

    public function setParameters(array $parameters);

    public function setController(string $controller);

    public function setAction(string $action);
}
