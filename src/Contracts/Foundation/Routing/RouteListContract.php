<?php

namespace Ghosty\Framework\Contracts\Foundation\Routing;

use Ghosty\Framework\Foundation\Routing\Route;

interface RouteListContract
{
    /**
     * Add route to list
     *
     * @param  mixed $item
     * @return void
     */
    public function push(Route $item);





    /**
     * Get and delete last route from list
     *
     * @return Route
     */
    public function pop(): Route;





    /**
     * Get last route from list
     *
     * @return Route
     */
    public function top(): Route;
}
