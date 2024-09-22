<?php

namespace ArdaGnsrn\Tron\Resources;

use ArdaGnsrn\Tron\TronClient;

class BaseResource
{
    protected TronClient $tronClient;

    public function __construct(TronClient $tronClient)
    {
        $this->tronClient = $tronClient;
    }
}
