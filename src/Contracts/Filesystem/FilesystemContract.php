<?php

namespace Ghosty\Framework\Contracts\Filesystem;

interface FilesystemContract
{
    public function exists(string $path): bool;

    public function get(string $path): string;

    public function put(string $path, string $content): void;

    public function append(string $path, string $content): void;

    public function prepend(string $path, string $content): void;
}
