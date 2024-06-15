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
        Container::singleton(\Ghosty\Contracts\Database\Connection\ConnectionContract::class, \Ghosty\Database\Connection\Connection::class);
    }
}
