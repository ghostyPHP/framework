<?php

namespace Ghosty\Database;

use Ghosty\Container\Facades\Container;

class DatabaseServiceProvider
{
    public function boot()
    {
        /**
         * Bind connection as singleton
         */
        Container::singleton(\Ghosty\Contracts\Database\ConnectionContract::class, Connection::class);
    }
}
