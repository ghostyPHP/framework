<?php

namespace Ghosty\Framework\Log;

use Anvil\Log\LoggerFactory;
use Ghosty\Framework\Container\Container;
use Ghosty\Framework\Foundation\Application;

class Log
{
    public static function __callStatic($name, $arguments)
    {
        return (new LoggerFactory(Container::getInstance(), Container::make(Application::class)->basePath . '/sex.log'))
            ->create()
            ->$name(...$arguments);
    }
}
