<?php

namespace Ghosty\Framework\Contracts\Database\Connection;

use Ghosty\Framework\Database\Connection\Connection;
use PDO;

interface ConnectionContract
{
    public function open(string $driver, string $host, int $port, string $database, string $username, string $password): Connection;

    public function close(): Connection;

    public function get(): PDO;
}
