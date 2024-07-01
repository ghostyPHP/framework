<?php

namespace Ghosty\Framework\Support\Facades;

/**
 * @method static bool exists(string $path) Checks if file exists
 * @method static void put(string $path, string $content) Put content to file
 * @method static string get(string $path) Get file content
 * @method static void append(string $path, string $content) Appdend content to file
 * @method static void prepend(string $path, string $content) Prepend content to file
 */
class File extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ghosty\Framework\Filesystem\Filesystem::class;
    }
}
