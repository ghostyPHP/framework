<?php

namespace Ghosty\Framework\Contracts;

use Ghosty\Component\HttpFoundation\Contracts\ResponseContract;

interface ApplicationContract
{
    public function createResponse(): ResponseContract;
}
