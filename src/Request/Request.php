<?php

namespace Ghosty\Framework\Request;

use Ghosty\Component\HttpFoundation\Contracts\Bags\AttributeBagContract;
use Ghosty\Component\HttpFoundation\Contracts\RequestContract as ContractsRequestContract;
use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\Request\RequestContract;

class Request implements RequestContract
{
    public function setAttributes(AttributeBagContract $attributes): void
    {
        Container::make(ContractsRequestContract::class)->setAttributes($attributes);
    }
}
