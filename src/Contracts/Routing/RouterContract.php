<?php

namespace Ghosty\Contracts\Routing;

interface RouterContract
{
    /**
     * Dispatch route
     *
     * @return void
     */
    public function dispatch();
}
