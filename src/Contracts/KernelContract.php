<?php

namespace Ghosty\Framework\Contracts;

use Ghosty\Component\HttpFoundation\Contracts\ResponseContract;

interface KernelContract
{
    public function getResponse(): ResponseContract;
}
