<?php

namespace Ghosty\Framework\Contracts\Request;

use Ghosty\Component\HttpFoundation\Contracts\Bags\AttributeBagContract;

interface RequestContract
{
    public function setAttributes(AttributeBagContract $attributes): void;
}
