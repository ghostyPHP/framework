<?php

namespace Ghosty\Framework\Contracts\Foundation\Routing;

interface RouteContract
{
    /**
     * Get route URL
     *
     * @return string
     */
    public function getUrl(): string;





    /**
     * Get route parameters
     *
     * @return array
     */
    public function getParameters(): array;






    /**
     * Get route method
     *
     * @return string
     */
    public function getMethod(): string;





    /**
     * Get route controller
     *
     * @return string
     */
    public function getController(): string;





    /**
     * Get route action
     *
     * @return string
     */
    public function getAction(): string;





    /**
     * Get route middle
     *
     * @return array
     */
    public function getMiddlewares(): array;





    /**
     * Set route method
     *
     * @return void
     */
    public function setMethod(string $method);





    /**
     * Set route URL
     *
     * @return void
     */
    public function setUrl(string $url);





    /**
     * Set route parameters
     *
     * @return void
     */
    public function setParameters(array $parameters);





    /**
     * Set route controller
     *
     * @return void
     */
    public function setController(string $controller);





    /**
     * Set route action
     *
     * @return void
     */
    public function setAction(string $action);





    /**
     * Add route middlewares
     *
     * @return string
     */
    public function addMiddleware(string $middleware);
}
