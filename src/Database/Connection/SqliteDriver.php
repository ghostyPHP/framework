<?php

namespace Ghosty\Framework\Database\Connection;

use Ghosty\Framework\Contracts\Database\Connection\DriverContract;
use PDO;

class SqliteDriver implements DriverContract
{
    public static function connect(string $host, int $port, string $database, string $username, string $password): PDO
    {
        return new PDO('sqlite:' . $database);
    }
}
