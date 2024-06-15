<?php

namespace Ghosty\Framework\Database\Connection;

use Ghosty\Framework\Contracts\Database\Connection\ConnectionContract;
use Ghosty\Framework\Support\Env;
use PDO;

class Connection implements ConnectionContract
{
    private PDO $PDO;

    public function open(string $driver, string $host, int $port, string $database, string $username, string $password): Connection
    {
        $this->PDO = $this->getDriver($driver)::connect($host,  $port,  $database,  $username,  $password);

        return $this;
    }



    /**
     * Get driver
     *
     * @return \Ghosty\Framework\Contracts\Database\Connection\DriverContract
     * 
     * @throws \DriverNotFoundException
     */
    private function getDriver(string $driver)
    {
        switch ($driver)
        {
            case ('mysql'):
                return MysqlDriver::class;
            case ('sqlite'):
                return SqliteDriver::class;
            case ('pgsql'):
                return PostgresqlDriver::class;
        }

        throw new DriverNotFoundException('Driver ' . $driver . ' not found');
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
