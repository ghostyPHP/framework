<?php

namespace Ghosty\Framework\Config;

use Ghosty\Component\Bag\Bag;
use Ghosty\Component\Bag\Contracts\BagContract;
use Ghosty\Framework\Contracts\Config\ConfigContract;
use Ghosty\Framework\Exceptions\Config\ConfigDoesNotExistException;
use Ghosty\Framework\Filesystem\Filesystem;
use Ghosty\Framework\Support\Facades\File;

class Config implements ConfigContract
{
    private BagContract $configBag;

    public function get(string $configFile, string $key, mixed $default): mixed
    {
        if (!File::exists(APP_PATH . '/config/' . $configFile . '.php'))
        {
            return $default;
        }

        $this->configBag = new Bag(require APP_PATH . '/config/' . $configFile . '.php');

        if (!$this->configBag->has($key))
        {
            return $default;
        }
        return $this->configBag->get($key);
    }
}
