<?php

namespace Ghosty\Framework\Http;

use Ghosty\Component\HttpFoundation\Bags\AttributeBag;
use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\HttpFoundation\Contracts\ResponseContract;
use Ghosty\Component\HttpFoundation\Response;
use Ghosty\Component\Routing\Contracts\RouteContract;
use Ghosty\Framework\Container\Container;
use Ghosty\Framework\Exceptions\Http\ActionDoesNotExistsException;
use Ghosty\Framework\Exceptions\Http\ControllerDoesNotExistsException;
use Ghosty\Framework\Http\Middleware\Middleware;
use Ghosty\Framework\Routing\Router as FrameworkRouter;

class Kernel
{
    private RouteContract $currentRoute;

    public function __construct(private RequestContract $request, private FrameworkRouter $router, private Middleware $middleware)
    {
        $this->dispatchRoutes();
    }

    public function dispatchRoutes(): Kernel
    {
        $Router = $this->router->create($this->request);
        $this->currentRoute = $Router->getCurrentRoute();

        $this->request->setAttributes(new AttributeBag($Router->getAttributes()->all()));
        return $this;
    }

    public function handle(): ResponseContract
    {
        $middlewares = $this->currentRoute->getMiddlewaresBag();

        $this->middleware->dispatch($middlewares);

        $controller = $this->currentRoute->getController();

        if (!class_exists($controller))
        {
            throw new ControllerDoesNotExistsException($controller);
        }

        $action = $this->currentRoute->getAction();

        if (!method_exists($controller, $action))
        {
            throw new ActionDoesNotExistsException($action, $controller);
        }

        $response = Container::make($controller)->$action();

        return $response instanceof ResponseContract ? $response : new Response((string) $response);
    }
}
