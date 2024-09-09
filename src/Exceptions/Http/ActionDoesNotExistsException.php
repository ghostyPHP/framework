<?php

namespace Ghosty\Framework\Exceptions\Http;

class ActionDoesNotExistsException extends \Exception
{
    public function __construct(string $action)
    {
        parent::__construct("Controller '$action' does not eixsts");
    }
}
