<?php

namespace ArdaGnsrn\Tron;

final class Tron
{
    protected TronClient $client;

    public function __construct(string|TronNetwork $network = TronNetwork::MAINNET)
    {
        if ($network instanceof TronNetwork) $network = $network->value;

        $this->client = new TronClient($network);
    }

    public function addresses(): Resources\Address
    {
        return new Resources\Address($this->client);
    }
}
