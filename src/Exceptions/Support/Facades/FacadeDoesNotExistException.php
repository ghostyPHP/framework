<?php

namespace Ghosty\Framework\Exceptions\Support\Facades;

class FacadeDoesNotExistException extends \RuntimeException
{
    public function __construct(string $facade)
    {
        parent::__construct("Facade '$facade' does not exist");
    }
}
