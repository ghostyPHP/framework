<?php

namespace Ghosty\Contracts\Http;

use Ghosty\Foundation\Routing\Route;

interface RequestContract
{
    public function method(): string;

    public function url(): string;

    public function route(?string $param, ?string $default): string;

    public function query(): array;

    public function get(?string $param, ?string $default): string;

    public function post(?string $param, ?string $default): string;

    public function getRoute(): Route;

    public function setRoute(Route $route): void;
}
