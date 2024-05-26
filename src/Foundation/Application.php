<?php

namespace Ghosty\Foundation;

use Ghosty\Container\Container;
use Ghosty\Contracts\Foundation\ApplicationContract;

class Application extends Container implements ApplicationContract
{
    public function __construct()
    {
        $this->registerCoreServices();
    }



    private function registerCoreServices()
    {
        $this->singleton(\Ghosty\Contracts\Foundation\ApplicationContract::class, \Ghosty\Foundation\Application::class);
        $this->singleton(\Ghosty\Contracts\Routing\RouteContract::class, \Ghosty\Routing\Route::class);
        $this->singleton(\Ghosty\Contracts\Routing\RouterContract::class, \Ghosty\Routing\Router::class);

        $this->singleton(\Ghosty\Contracts\Http\RequestContract::class, \Ghosty\Http\Request::class);
    }
}
