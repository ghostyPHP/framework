<?php

namespace Ghosty\Foundation\Http;

use Ghosty\Contracts\Foundation\ApplicationContract;
use Ghosty\Contracts\Foundation\Http\KernelContract;
use Ghosty\Routing\Router;

class Kernel implements KernelContract
{
    public function __construct(protected ApplicationContract $app)
    {
        $this->initRoutes();

        $this->app->make(\Ghosty\Contracts\Routing\RouterContract::class)
            ->dispatch();
    }



    private function initRoutes()
    {
        $this->app->bind('routes', \Routes\API::class);
        $this->app->make('routes');
    }



    public function handle(): string
    {
        return 'handled';
    }
}
