<?php

namespace Ghosty\Foundation\Http;

use Ghosty\Container\Container;
use Ghosty\Contracts\Foundation\ApplicationContract;
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

        Container::getInstance()->make(RouterContract::class)->dispatch();
    }



    private function dispatchServiceProviders()
    {
        foreach ($this->serviceProviders as $ServiceProvider)
        {
            Container::getInstance()->make($ServiceProvider);
        }
    }




    public function handle(): string
    {
        $Controller = Container::getInstance()
            ->make(RequestContract::class)
            ->getRoute()
            ->getController();

        $Action = Container::getInstance()
            ->make(RequestContract::class)
            ->getRoute()
            ->getAction();

        return Container::getInstance()->make($Controller)->$Action();
    }
}
