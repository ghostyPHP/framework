<?php

namespace Ghosty\Contracts\Http;

interface RequestContract
{
    public static function method(): string;

    public static function url(): string;

    public static function route(?string $param, ?string $default): string;

    public static function query(): array;

    public static function get(?string $param, ?string $default): string;

    public static function post(?string $param, ?string $default): string;
}
