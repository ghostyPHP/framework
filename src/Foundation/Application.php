<?php

namespace Ghosty\Framework\Foundation;

use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\HttpFoundation\Request;
use Ghosty\Container\Binding;
use Ghosty\Framework\Container\Container;
use Ghosty\Framework\Http\Kernel;

class Application
{
    private string $routePath = '';

    private array $serviceProviders = [];

    public function __construct(public string $basePath)
    {
        $this->registerCoreServices();
    }

    private function registerCoreServices()
    {
        Container::bind(RequestContract::class, (new Binding(Request::class))->singleton());
    }

    public function handleRequest()
    {
        return Container::make(Kernel::class)->handle();
    }

    public function setRoutePath(string $routePath): void
    {
        $this->routePath = $routePath;
    }

    public function getRoutePath(): string
    {
        return $this->routePath;
    }

    public function setServiceProviders(array $serviceProviders): void
    {
        $this->serviceProviders = $serviceProviders;
    }

    public function getServiceProviders(): array
    {
        return $this->serviceProviders;
    }
}
