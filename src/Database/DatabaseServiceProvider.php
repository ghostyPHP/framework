<?php

namespace Ghosty\Framework\Database;

use Ghosty\Container\Facades\Container;

class DatabaseServiceProvider
{
    public function boot()
    {
        /**
         * Bind connection as singleton
         */
        Container::singleton(\Ghosty\Framework\Contracts\Database\Connection\ConnectionContract::class, \Ghosty\Framework\Database\Connection\Connection::class);
    }
}
