<?php

namespace Ghosty\Contracts\Foundation\Http;

/**
 * @property array $serviceProviders Service Providers
 * 
 * 
 */
interface KernelContract
{
    public function handle(): ?string;
}
