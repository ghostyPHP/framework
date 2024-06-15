<?php

namespace Ghosty\Framework\Support\Facades;

use Ghosty\Framework\Contracts\Http\RequestContract;
use Ghosty\Framework\Http\Request as HttpRequest;

/**
 * @method static string method()
 * @method static string url(string $abstract, string $concrete, bool $singleton)
 * @method static string route(string $param, string $default)
 * @method static array query()
 * @method static string get(string $param, string $default)
 * @method static string post(string $param, string $default)
 */

class Request extends Facade
{
    protected static function getFacadeName()
    {
        return RequestContract::class;
    }
}
