<?php

namespace Ghosty\Framework\Exceptions\Filesystem;

class FileDoesNotExistException extends \RuntimeException
{
    public function __construct(string $file)
    {
        parent::__construct("File $file does not exist!");
    }
}
