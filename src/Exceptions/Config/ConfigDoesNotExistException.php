<?php

namespace Ghosty\Framework\Exceptions\Config;

class ConfigDoesNotExistException extends \RuntimeException
{
    public function __construct(string $configFile, string $key)
    {
        parent::__construct("Config '$configFile' key '$key' does not exist!");
    }
}
