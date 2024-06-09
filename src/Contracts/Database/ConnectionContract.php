<?php

namespace Ghosty\Contracts\Database;

use Ghosty\Database\Connection;
use PDO;

interface ConnectionContract
{
    public function open(string $host, int $port, string $database, string $username, string $password): Connection;

    public function close(): Connection;

    public function get(): PDO;
}
