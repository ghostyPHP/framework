<?php

namespace Ghosty\Routing;

use Exception;
use Ghosty\Contracts\Routing\RouteNotFoundExeptionContract;

class RouteNotFoundExeption extends Exception implements RouteNotFoundExeptionContract
{
}
