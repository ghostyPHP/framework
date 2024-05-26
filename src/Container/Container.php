<?php

namespace Ghosty\Container;

use Ghosty\Contracts\Container\ContainerContract;

class Container implements ContainerContract
{
    /**
     * The container's bindings.
     *
     * @var array
     */
    private array $bindings = [];



    /**
     * The container's singleton bindings.
     *
     * @var array
     */
    private array $singletons = [];



    public function bind(string $abstract, ?string $concrete = null, bool $singleton = false): void
    {
        $singleton ? $this->singleton($abstract, $concrete) : $this->bindings[$abstract] = $concrete;
    }



    public function singleton(string $abstract, ?string $concrete = null): void
    {
        $this->singletons[$abstract] = $concrete;
    }



    public function make($abstract): mixed
    {
        if (!array_key_exists($abstract, $this->bindings) && !array_key_exists($abstract, $this->singletons))
        {
            throw new BindingNotFoundExeption("Binding '$abstract' not found");
        }


        if (!array_key_exists($abstract, $this->singletons))
        {
            return $this->prepareObject($abstract);
        }


        if (!is_object($this->singletons[$abstract]))
        {
            return $this->prepareSingleton($abstract);
        }


        return $this->singletons[$abstract];
    }



    private function prepareObject(string $abstract)
    {

        $class = $this->bindings[$abstract];

        $classReflector = new \ReflectionClass($class);


        $constructReflector = $classReflector->getConstructor();
        if (empty($constructReflector))
        {
            return new $class;
        }


        $constructArguments = $constructReflector->getParameters();
        if (empty($constructArguments))
        {
            return new $class;
        }


        $args = [];
        foreach ($constructArguments as $argument)
        {

            $argumentType = $argument->getType()->getName();


            $args[$argument->getName()] = $this->make($argumentType);
        }

        return new $class(...$args);
    }



    private function prepareSingleton(string $abstract)
    {
        $class = $this->singletons[$abstract];

        $classReflector = new \ReflectionClass($class);


        $constructReflector = $classReflector->getConstructor();
        if (empty($constructReflector))
        {
            $this->singletons[$abstract] = new $class;
            return $this->singletons[$abstract];
        }


        $constructArguments = $constructReflector->getParameters();
        if (empty($constructArguments))
        {
            $this->singletons[$abstract] = new $class;
            return $this->singletons[$abstract];
        }


        $args = [];
        foreach ($constructArguments as $argument)
        {

            $argumentType = $argument->getType()->getName();


            $args[$argument->getName()] = $this->make($argumentType);
        }


        $this->singletons[$abstract] = new $this->singletons[$abstract](...$args);
        return $this->singletons[$abstract];
    }
}
