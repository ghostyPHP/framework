<?php

namespace Ghosty\Foundation;

use Ghosty\Support\Facades\Container;
use Ghosty\Contracts\Foundation\ApplicationContract;
use Ghosty\Contracts\Foundation\Http\KernelContract;
use Ghosty\Contracts\Http\RequestContract;
use Ghosty\Contracts\Routing\RouteContract;
use Ghosty\Contracts\Routing\RouterContract;
use Ghosty\Http\Request;
use Ghosty\Routing\Route;
use Ghosty\Routing\Router;

class Application implements ApplicationContract
{

    private KernelContract $Kernel;

    public function __construct()
    {
        $this->registerCoreServices();

        $this->Kernel = Container::make(KernelContract::class);
    }



    private function registerCoreServices()
    {
        Container::singleton(RouterContract::class, Router::class);

        Container::singleton(RouteContract::class, Route::class);

        Container::singleton(RequestContract::class, Request::class);
    }



    public function handle()
    {
        return $this->Kernel->handle();
    }
}
