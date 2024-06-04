<?php

namespace Ghosty\Foundation\Http;

use Ghosty\Support\Facades\Container;
use Ghosty\Contracts\Foundation\Http\KernelContract;
use Ghosty\Contracts\Http\RequestContract;
use Ghosty\Contracts\Routing\RouterContract;

class Kernel implements KernelContract
{
    public string $test = 'just test';

    public function __construct()
    {
        $this->dispatchRoute();

        $this->dispatchServiceProviders();
    }



    private function dispatchRoute()
    {
        require_once APP_PATH . '/routes/api.php';

        Container::make(RouterContract::class)->dispatch();
    }



    private function dispatchServiceProviders()
    {
        foreach ($this->serviceProviders as $ServiceProvider)
        {
            Container::make($ServiceProvider)->boot();
        }
    }



    private function dispatchMiddlewares(array $middlewares)
    {
        foreach ($middlewares as $middleware)
        {
            Container::make($middleware)->handle();
        }
    }




    public function handle(): string
    {
        $Middlewares = Container::make(RequestContract::class)
            ->getRoute()
            ->getMiddlewares();

        $this->dispatchMiddlewares($Middlewares);


        $Controller = Container::make(RequestContract::class)
            ->getRoute()
            ->getController();

        $Action = Container::make(RequestContract::class)
            ->getRoute()
            ->getAction();

        return Container::make($Controller)->$Action();
    }
}
