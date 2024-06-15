<?php

namespace Ghosty\Framework\Support\Facades;

use Ghosty\Framework\Database\Database;

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
