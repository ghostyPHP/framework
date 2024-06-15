<?php

namespace Ghosty\Framework\Contracts\Database;

use PDO;

interface DatabaseContract
{
    public function getPDO(): PDO;
}
