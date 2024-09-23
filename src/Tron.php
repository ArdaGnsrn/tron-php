<?php

namespace ArdaGnsrn\Tron;

final class Tron
{
    protected TronClient $client;

    public function __construct(string|TronNetwork $network = TronNetwork::MAINNET)
    {
        if (!extension_loaded('gmp')) {
            throw new \Exception('GMP extension is required for this library');
        }

        if ($network instanceof TronNetwork) $network = $network->value;

        $this->client = new TronClient($network);
    }

    public function addresses(): Resources\Address
    {
        return new Resources\Address($this->client);
    }

    public function accounts(): Resources\Account
    {
        return new Resources\Account($this->client);
    }
}
