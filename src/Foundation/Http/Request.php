<?php

namespace Ghosty\Foundation\Http;

use Ghosty\Contracts\Foundation\Http\RequestContract;

class Request implements RequestContract
{
    public static function url(): string
    {
        return substr($_SERVER['REQUEST_URI'], 1);
    }



    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
