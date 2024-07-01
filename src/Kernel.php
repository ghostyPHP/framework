<?php

namespace Ghosty\Framework;

use finfo;
use Ghosty\Component\HttpFoundation\Bags\AttributeBag;
use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\HttpFoundation\Contracts\ResponseContract;
use Ghosty\Component\HttpFoundation\Response;
use Ghosty\Component\Routing\Contracts\RouteContract;
use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\KernelContract;
use Ghosty\Framework\Exceptions\ActionDoesNotExistException;
use Ghosty\Framework\Exceptions\ControllerDoesNotExistException;
use Ghosty\Framework\Middleware\Middleware;
use Ghosty\Framework\Provider\Provider;
use Ghosty\Framework\Request\Request;
use Ghosty\Framework\Routing\Router;

class Kernel implements KernelContract
{
    private RouteContract $currentRoute;

    public function __construct(private Router $framewrokRouter, private Request $frameworkRequest, private Provider $frameworkProvider, private Middleware $frameworkMiddleware)
    {
        $this->dispatchRoutes();

        $this->dispatchProviders();
    }

    private function dispatchRoutes()
    {
        $Router = $this->framewrokRouter->createRouter();

        $this->currentRoute = $Router->getCurrentRoute();

        $this->frameworkRequest->setAttributes(new AttributeBag($Router->getAttributes()->all()));
    }

    private function dispatchProviders()
    {
        $this->frameworkProvider->dispatch();
    }

    public function getResponse(): ResponseContract
    {
        $middlewares = $this->currentRoute->getMiddlewaresBag();

        $this->frameworkMiddleware->dispatch($middlewares);

        $controller = $this->currentRoute->getController();

        if (!class_exists($controller))
        {
            throw new ControllerDoesNotExistException($controller);
        }

        $action = $this->currentRoute->getAction();

        if (!method_exists($controller, $action))
        {
            throw new ActionDoesNotExistException($action, $controller);
        }

        $response = Container::make($controller)->$action();

        return $response instanceof ResponseContract ? $response : new Response((string) $response);
    }
}
