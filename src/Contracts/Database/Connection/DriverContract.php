<?php

namespace Ghosty\Framework\Contracts\Database\Connection;

use PDO;

interface DriverContract
{
    public static function connect(string $host, int $port, string $database, string $username, string $password): PDO;
}
