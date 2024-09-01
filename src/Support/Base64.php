<?php

namespace Ghosty\Framework\Support\Base64;

class Base64
{
    public function encode(string $string): string
    {
        return base64_encode($string);
    }

    public function decode(string $string, bool $strict = false): string
    {
        return base64_decode($string, $strict);
    }
}
