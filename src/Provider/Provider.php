<?php

namespace Ghosty\Framework\Provider;

use Ghosty\Container\Facades\Container;
use Ghosty\Framework\Contracts\Provider\ProviderContract;
use Ghosty\Framework\Exceptions\Provider\ProviderDoesNotExistException;
use Ghosty\Framework\Support\Facades\Config;

class Provider implements ProviderContract
{
    public function dispatch(): void
    {
        foreach (Config::get('app', 'providers', []) as $provider)
        {
            if (!class_exists($provider))
            {
                throw new ProviderDoesNotExistException($provider);
            }

            Container::make($provider);
        }
    }
}
