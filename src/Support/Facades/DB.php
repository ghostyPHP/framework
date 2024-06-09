<?php

namespace Ghosty\Support\Facades;

use Ghosty\Database\Database;

/**
 * @method static \PDO getPDO() Get new connection

 */
class DB extends Facade
{
    public static function getFacadeName()
    {
        return Database::class;
    }
}
