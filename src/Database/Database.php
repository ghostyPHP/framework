<?php

namespace Ghosty\Database;

use Ghosty\Container\Facades\Container;
use Ghosty\Contracts\Database\Connection\ConnectionContract;
use Ghosty\Contracts\Database\DatabaseContract;
use Ghosty\Support\Env;
use PDO;

class Database implements DatabaseContract
{
    public function getPDO(): PDO
    {
        /**@var \Ghosty\Contracts\Database\ConnectionContract*/
        $Connection = Container::make(ConnectionContract::class);

        return $Connection->open(
            Env::get('DB_CONNECTION', 'mysql'),
            Env::get('DB_HOST', 'localhost'),
            Env::get('DB_PORT', 3306),
            Env::get('DB_DATABASE', 'ghosty'),
            Env::get('DB_USERNAME', 'root'),
            Env::get('DB_PASSWORD', 'root')
        )->get();
    }
}
