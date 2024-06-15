<?php

namespace Ghosty\Framework\Foundation\Routing;

use Ghosty\Framework\Contracts\Foundation\Routing\RouteListContract;
use RuntimeException;

class RouteList implements RouteListContract
{
    private array $stack = [];

    public function push(Route $item)
    {
        array_unshift($this->stack, $item);
    }



    public function pop(): Route
    {
        if ($this->isEmpty())
        {
            throw new RuntimeException("Stack is empty");
        }

        return array_shift($this->stack);
    }



    public function top(): Route
    {
        return current($this->stack);
    }



    public function isEmpty()
    {
        return empty($this->stack);
    }
}
