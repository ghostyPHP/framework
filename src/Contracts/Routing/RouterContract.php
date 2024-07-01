<?php

namespace Ghosty\Framework\Contracts\Routing;

use Ghosty\Component\Routing\Contracts\RouterContract as ContractsRouterContract;

interface RouterContract
{
    public function createRouter(): ContractsRouterContract;
}
