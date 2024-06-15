<?php

namespace Ghosty\Framework\Foundation;

use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\Foundation\ApplicationContract;
use Ghosty\Framework\Contracts\Foundation\Http\KernelContract;
use Ghosty\Framework\Contracts\Http\RequestContract;
use Ghosty\Framework\Contracts\Routing\RouteContract;
use Ghosty\Framework\Contracts\Routing\RouterContract;
use Ghosty\Framework\Http\Request;
use Ghosty\Framework\Routing\Route;
use Ghosty\Framework\Routing\Router;

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
