<?php

namespace ArdaGnsrn\Tron\Resources;

use ArdaGnsrn\Tron\Contracts\AccountContract;
use ArdaGnsrn\Tron\Support\Tron;
use ArdaGnsrn\Tron\Utils;

final class Account extends BaseResource implements AccountContract
{

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function balance(string $address): float
    {
        $address = Utils::addressToHex($address);
        $response = $this->tronClient->client->post('/walletsolidity/getaccount', [
            'json' => [
                'address' => $address,
            ],
        ]);

        $body = json_decode($response->getBody()->getContents(), true);
        return Tron::convert($body['balance']);
    }

    public function transactions(string $address, bool $onlyConfirmed = true, $limit = 20): array
    {
        $address = Utils::addressToHex($address);
        $response = $this->tronClient->client->get("/v1/accounts/{$address}/transactions", [
            'query' => [
                'only_confirmed' => $onlyConfirmed,
                'limit' => $limit,
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
