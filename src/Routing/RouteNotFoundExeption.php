<?php

namespace Ghosty\Framework\Routing;

use Exception;
use Ghosty\Framework\Contracts\Routing\RouteNotFoundExeptionContract;

class RouteNotFoundExeption extends Exception implements RouteNotFoundExeptionContract
{
}
