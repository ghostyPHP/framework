<?php

namespace Ghosty\Contracts\Container;

interface ContainerContract
{

    /**
     * Register a singleton binding with the container.
     *
     * @param  string $abstract Abstract
     * @param  string $concrete Realization
     * @return void
     */
    public function singleton(string $abstract, string $concrete = null): void;






    /**
     * Register a binding with the container.
     *
     * @param  string $abstract Abstract
     * @param  string $concrete Realization
     * @param  bool $singleton Singleton
     * @return void
     */
    public function bind(string $abstract, string $concrete = null, bool $singleton = false): void;





    /**
     * Resolve the given type from the container.
     *
     * @param  mixed $abstract Abstract
     * @return mixed
     */
    public function make($abstract): mixed;
}
