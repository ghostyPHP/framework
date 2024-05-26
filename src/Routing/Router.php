<?php

namespace Ghosty\Foundation\Routing;

use Ghosty\Contracts\Foundation\Routing\RouterContract;

class Router implements RouterContract
{
    public function biba($text): string
    {
        return $text . "it's just a text<br>";
    }
}
