<?php

namespace Ghosty\Contracts\Routing;

use Ghosty\Foundation\Routing\RouteList;
use Ghosty\Routing\Route;

interface RouteContract
{

    /**
     * Get all created routes
     *
     * @return array Routes
     */
    public function getRoutes(): RouteList;





    /**
     * Create new route with GET method
     *
     * @param  mixed $url URL
     * @return Route
     */
    public function get(string $url): Route;





    /**
     * Create new route with POST method
     *
     * @param  mixed $url URL
     * @return Route
     */
    public function post(string $url): Route;





    /**
     * Add controller to route
     *
     * @param  mixed $url URL
     * @return Route
     */
    public function controller(string $controller): Route;





    /**
     * Add action to route
     *
     * @param  mixed $url URL
     * @return Route
     */
    public function action(string $action): Route;





    /**
     * Add middleware to route
     *
     * @param  string|array $middleware Middleware
     * @return Route
     */
    public function middleware(string|array $middlewares): Route;
}
