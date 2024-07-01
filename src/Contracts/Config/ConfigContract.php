<?php

namespace Ghosty\Framework\Contracts\Config;

interface ConfigContract
{
    public function get(string $configFile, string $key, mixed $default): mixed;
}
