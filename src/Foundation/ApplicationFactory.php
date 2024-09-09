<?php

namespace Ghosty\Framework\Foundation;

use Ghosty\Container\Binding;
use Ghosty\Framework\Container\Container;

class ApplicationFactory
{
    private Application $app;

    public function __construct(string $basePath)
    {
        Container::bind(Application::class, (new Binding(Application::class))->singleton()->withArgs(['basePath' => $basePath]));
        $this->app = Container::make(Application::class);
    }

    public function withRoutes(string $routes = null): ApplicationFactory
    {
        if (is_null($routes))
        {
            $routes = '/routes/routes.php';
        }

        $this->app->setRoutePath($this->app->basePath . '/' . $routes);

        return $this;
    }

    public function withProviders(array $providers = []): ApplicationFactory
    {
        $this->app->setServiceProviders($providers);
        return $this;
    }

    public function create(): Application
    {
        return $this->app;
    }
}
