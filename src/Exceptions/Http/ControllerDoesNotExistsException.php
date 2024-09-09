<?php

namespace Ghosty\Framework\Exceptions\Http;

class ControllerDoesNotExistsException extends \Exception
{
    public function __construct(string $controller)
    {
        parent::__construct("Controller '$controller' does not eixsts");
    }
}
