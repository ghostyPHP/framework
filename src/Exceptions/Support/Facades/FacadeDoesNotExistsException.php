<?php

namespace Ghosty\Framework\Exceptions\Support\Facades;

class FacadeDoesNotExistsException extends \Exception
{
    public function __construct(string $facade)
    {
        parent::__construct("Facade '$facade' does not exist");
    }
}
