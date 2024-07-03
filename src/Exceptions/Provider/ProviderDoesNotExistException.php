<?php

namespace Ghosty\Framework\Exceptions\Provider;

class ProviderDoesNotExistException extends \RuntimeException
{
    public function __construct(string $provider)
    {
        parent::__construct("Provider '$provider' does not exist");
    }
}
