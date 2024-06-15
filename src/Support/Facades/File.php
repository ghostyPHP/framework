<?php

namespace Ghosty\Framework\Support\Facades;

use Ghosty\Framework\Filesystem\Filesystem;


/**
 * @method static string get(string $path) Get file content
 * @method static bool put(string $path, string $data) Put data to file
 * @method static string add(string $path, string $data) Add data to file
 */
class File extends Facade
{
    protected static function getFacadeName()
    {
        return Filesystem::class;
    }
}
