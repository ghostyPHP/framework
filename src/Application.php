<?php

namespace Ghosty\Framework;

use Ghosty\Component\HttpFoundation\Contracts\ResponseContract;
use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\ApplicationContract;
use Ghosty\Framework\Contracts\KernelContract;

class Application implements ApplicationContract
{
    private KernelContract $kernel;

    public function __construct()
    {
        $this->registerCoreServices();

        $this->kernel = Container::make(\Ghosty\Framework\Contracts\KernelContract::class);
    }


    private function registerCoreServices()
    {
        Container::singleton(\Ghosty\Component\HttpFoundation\Contracts\RequestContract::class, \Ghosty\Component\HttpFoundation\Request::class);
        Container::singleton(\Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract::class, \Ghosty\Component\Routing\Stacks\RouteStack::class);
    }


    public function createResponse(): ResponseContract
    {
        return $this->kernel->getResponse();
    }
}
