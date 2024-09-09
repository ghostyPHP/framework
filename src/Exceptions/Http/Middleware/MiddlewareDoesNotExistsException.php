<?php

namespace Ghosty\Framework\Exceptions\Http\Middleware;

class MiddlewareDoesNotExistsException extends \Exception
{
    public function __construct(string $middleware)
    {
        parent::__construct("Middleware '$middleware' does not exists");
    }
}
