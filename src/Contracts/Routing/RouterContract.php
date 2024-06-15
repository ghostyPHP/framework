<?php

namespace Ghosty\Framework\Contracts\Routing;

interface RouterContract
{
    /**
     * Dispatch route
     *
     * @return void
     */
    public function dispatch();
}
