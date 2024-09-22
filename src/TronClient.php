<?php

namespace ArdaGnsrn\Tron;

use GuzzleHttp\Client;

class TronClient
{
    public Client $client;

    public function __construct(string $network)
    {
        $this->client = new Client([
            'base_uri' => $network,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }
}
