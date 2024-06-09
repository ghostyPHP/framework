<?php

namespace Ghosty\Database;

use Ghosty\Contracts\Database\ConnectionContract;
use PDO;

class Connection implements ConnectionContract
{
    private PDO $PDO;

    public function open(string $host, int $port, string $database, string $username, string $password): Connection
    {
        $this->PDO = new PDO(
            "mysql:host=" . $host . ";" .
                "port=" . $port . ";" .
                "dbname=" . $database,
            $username,
            $password
        );

        return $this;
    }



    public function close(): Connection
    {
        $this->PDO = null;
        return $this;
    }



    public function get(): PDO
    {
        return $this->PDO;
    }
}
