<?php

namespace Ghosty\Contracts\Foundation\Http;

interface RequestContract
{
    public static function url(): string;

    public static function method(): string;
}
