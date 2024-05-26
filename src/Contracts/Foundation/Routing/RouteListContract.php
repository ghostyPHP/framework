<?php

namespace Ghosty\Contracts\Foundation\Routing;

use Ghosty\Foundation\Routing\Route;

interface RouteListContract
{
    public function push(Route $item);

    public function pop(): Route;

    public function top(): Route;
}
