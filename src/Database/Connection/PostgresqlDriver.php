<?php

namespace Ghosty\Database\Connection;

use Ghosty\Contracts\Database\Connection\DriverContract;
use PDO;

class PostgresqlDriver implements DriverContract
{
    public static function connect(string $host, int $port, string $database, string $username, string $password): PDO
    {
        return new PDO(
            "pgsql:host=" . $host . ";" .
                "port=" . $port . ";" .
                "dbname=" . $database,
            $username,
            $password
        );
    }
}
