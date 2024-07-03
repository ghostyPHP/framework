<?php

namespace Ghosty\Framework\Exceptions\Support\Facades;

class FacadeDoesNotImplementMethodException extends \RuntimeException
{
    public function __construct(string $facade)
    {
        parent::__construct("Facade '$facade' does not implement getFacadeAccessor method.");
    }
}
