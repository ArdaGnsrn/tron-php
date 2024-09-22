<?php

namespace ArdaGnsrn\Tron\Resources;

use ArdaGnsrn\Tron\Contracts\AddressContract;

final class Address extends BaseResource implements AddressContract
{
    public function validate(string $address): bool
    {
        $response = $this->tronClient->client->post('/wallet/validateaddress', [
            'json' => [
                'address' => $address,
            ],
        ]);

        $body = json_decode($response->getBody()->getContents(), true);
        return $body['result'];
    }
}
