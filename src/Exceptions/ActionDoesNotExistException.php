<?php

namespace Ghosty\Framework\Exceptions;

class ActionDoesNotExistException extends \RuntimeException
{
    public function __construct(string $action, string $controller)
    {
        parent::__construct("Action $action does not exist in $controller controller");
    }
}
