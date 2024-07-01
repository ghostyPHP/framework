<?php

namespace Ghosty\Framework\Filesystem;

use Ghosty\Framework\Contracts\Filesystem\FilesystemContract;
use Ghosty\Framework\Exceptions\Filesystem\FileDoesNotExistException;

class Filesystem implements FilesystemContract
{

    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    public function get(string $path): string
    {
        if (!file_exists($path))
        {
            throw new FileDoesNotExistException($path);
        }

        return file_get_contents($path);
    }



    public function put(string $path, string $content): void
    {
        file_put_contents($path, $content);
    }



    public function append(string $path, string $content): void
    {
        $this->put($path, $this->get($path) . $content);
    }

    public function prepend(string $path, string $content): void
    {
        $this->put($path, $content . $this->get($path));
    }
}
