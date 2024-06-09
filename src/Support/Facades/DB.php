<?php

namespace Ghosty\Support\Facades;

use Ghosty\Database\Database;

/**
 * @method static \PDO getPDO() Get new connection

 */
class DB extends Facade
{
    protected static function getFacadeName()
    {
        return Database::class;
    }
}
