<?php

namespace Ghosty\Filesystem;

use Ghosty\Contracts\Filesystem\FilesystemContract;
use RuntimeException;

class Filesystem implements FilesystemContract
{
    public function get(string $path): string
    {
        if (!file_exists($path))
        {
            throw new RuntimeException('File does not exists');
        }

        return file_get_contents($path);
    }



    public function put(string $path, string $data): bool
    {
        return file_put_contents($path, $data) ? true : false;
    }



    public function add(string $path, string $data): bool
    {
        $fileContent = file_exists($path) ? $this->get($path) : '';

        return $this->put($path, $fileContent . $data);
    }
}
