<?php

namespace Ghosty\Container;

use Exception;
use Ghosty\Contracts\Container\BindingNotFoundExeptionContract;

class BindingNotFoundExeption extends Exception implements BindingNotFoundExeptionContract
{
}
