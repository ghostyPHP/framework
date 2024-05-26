<?php

namespace Ghosty\Foundation\Http;

use Ghosty\Contracts\Foundation\ApplicationContract;
use Ghosty\Contracts\Foundation\Http\KernelContract;
use Ghosty\IAboba;
use Ghosty\IBiba;

class Kernel implements KernelContract
{
    public string $test = 'test';
    public function __construct()
    {
    }



    public function handle(): string
    {
        return 'handled';
    }
}
