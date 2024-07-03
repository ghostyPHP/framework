<?php

namespace Ghosty\Framework\Exceptions\Middleware;

class MiddlewareDoesNotExistException extends \RuntimeException
{
    public function __construct(string $middleware)
    {
        parent::__construct("Middleware '$middleware' does not exist");
    }
}
