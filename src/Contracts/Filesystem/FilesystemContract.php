<?php

namespace Ghosty\Framework\Contracts\Filesystem;

interface FilesystemContract
{
    /**
     * Get file content
     *
     * @param  string $path Path to file
     * 
     * @throws RuntimeException
     * @return string
     */
    public function get(string $path): string;





    /**
     * Put data to file
     *
     * @param  mixed $path Path to file
     * @param  mixed $data Data
     * 
     * @throws RuntimeException
     * @return bool
     */
    public function put(string $path, string $data): bool;





    /**
     * Add data to file
     *
     * @param  mixed $path Path to file
     * @param  mixed $data Data
     * 
     * @throws RuntimeException
     * @return bool
     */
    public function add(string $path, string $data): bool;
}
