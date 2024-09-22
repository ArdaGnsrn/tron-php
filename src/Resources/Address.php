<?php

namespace ArdaGnsrn\Tron\Resources;

use ArdaGnsrn\Tron\Contracts\AddressContract;
use GuzzleHttp\Exception\GuzzleException;

final class Address extends BaseResource implements AddressContract
{
    /**
     * Validates address, returns either true or false.
     *
     * @param string $address
     * @return bool
     * @throws GuzzleException
     */
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
