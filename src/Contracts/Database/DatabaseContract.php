<?php

namespace Ghosty\Contracts\Database;

use PDO;

interface DatabaseContract
{
    public function getPDO(): PDO;
}
