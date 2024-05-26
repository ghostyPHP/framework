<?php

namespace Ghosty\Http;

use Ghosty\Contracts\Http\RequestContract;
use Ghosty\Foundation\Routing\Route;

class Request implements RequestContract
{
    protected static Route $Route;

    public static function url(): string
    {
        return substr($_SERVER['REQUEST_URI'], 1);
    }



    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }



    public static function query(): array
    {
        return $_GET;
    }



    public static function get(?string $param = null, ?string $default = null): string
    {
        return isset($_GET[$param]) ? $_GET[$param] : $default;
    }



    public static function post(?string $param = null, ?string $default = null): string
    {
        return isset($_POST[$param]) ? $_POST[$param] : $default;
    }



    public static function route(?string $param = null, ?string $default = null): string
    {
        $param = '{' . $param . '}';

        $parameters = self::getRoute()->getParameters();

        if (!array_key_exists($param, $parameters))
        {
            return $default;
        }

        return explode('/', Request::url())[$parameters[$param]];
    }



    private static function getRoute(): Route
    {
        return $GLOBALS['Route'];
    }
}
