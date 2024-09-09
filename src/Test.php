<?php

namespace Ghosty\Framework;

use Ghosty\Component\HttpFoundation\Response;

class Test
{
    public function test(): Response
    {
        return new Response('from test');
    }
}
