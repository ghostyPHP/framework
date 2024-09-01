<?php

namespace Ghosty\Framework\Support\JSON;

class JSON
{
    public function encode(mixed $value, int $flags = 0, int $depth = 512): string
    {
        return json_encode($value, $flags, $depth);
    }

    public function decode(string $json, bool $associative = null, int $depth = 512, int $flags = 0): array
    {
        return json_decode($json, $associative, $depth, $flags);
    }
}
