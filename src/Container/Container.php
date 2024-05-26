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

        if (array_key_exists($abstract, $this->singletons))
        {

            if (is_object($this->singletons[$abstract]))
            {
                return $this->singletons[$abstract];
            }
            return $this->prepareObject($abstract, true);
        }

        return $this->prepareObject($abstract);
    }



    private function prepareObject(string $abstract, bool $singleton = false)
    {
        $class = $singleton ? $this->singletons[$abstract] : $this->bindings[$abstract];

        $classReflector = new \ReflectionClass($class);

        // Получаем рефлектор конструктора класса, проверяем - есть ли конструктор
        // Если конструктора нет - сразу возвращаем экземпляр класса
        $constructReflector = $classReflector->getConstructor();
        if (empty($constructReflector))
        {
            if ($singleton)
            {
                $this->singletons[$abstract] = new $class;
            }

            return $this->make($abstract);
        }

        // Получаем рефлекторы аргументов конструктора
        // Если аргументов нет - сразу возвращаем экземпляр класса
        $constructArguments = $constructReflector->getParameters();
        if (empty($constructArguments))
        {
            if ($singleton)
            {
                $this->singletons[$abstract] = new $class;
            }

            return $this->make($abstract);
        }

        // Перебираем все аргументы конструктора, собираем их значения
        $args = [];
        foreach ($constructArguments as $argument)
        {
            // Получаем тип аргумента
            $argumentType = $argument->getType()->getName();

            // Получаем сам аргумент по его типу из контейнера
            $args[$argument->getName()] = $this->make($argumentType);
        }

        // И возвращаем экземпляр класса со всеми зависимостями
        if ($singleton)
        {
            $this->singletons[$abstract] = new $this->singletons[$abstract](...$args);
            return $this->make($abstract);
        }
        else
        {
            return new $class(...$args);
        }
    }
}
