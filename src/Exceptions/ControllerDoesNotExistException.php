<?php

namespace Ghosty\Framework\Exceptions;

class ControllerDoesNotExistException extends \RuntimeException
{
    public function __construct(string $controller)
    {
        parent::__construct("Controller $controller does not exist");
    }
}
