<?php

namespace ArdaGnsrn\Tron\Resources;

use ArdaGnsrn\Tron\Contracts\TransactionContract;
use ArdaGnsrn\Tron\Exceptions\TronException;
use ArdaGnsrn\Tron\Support\Secp;
use ArdaGnsrn\Tron\Utils;

final class Transaction extends BaseResource implements TransactionContract
{
    protected string $address;
    protected string $privateKey;

    public function setAddress(string $address): Transaction
    {
        $this->address = $address;
        return $this;
    }

    public function setPrivateKey(string $privateKey): Transaction
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    public function create(string $toAddress, float $amount, string $message = null): array
    {
        if (empty($this->address) || empty($this->privateKey)) {
            throw new TronException('Sender address and private key must be set');
        }

        if ($amount <= 0) {
            throw new TronException('Invalid amount provided');
        }

        $fromAddress = Utils::addressToHex($this->address);
        $toAddress = Utils::addressToHex($toAddress);

        if ($fromAddress === $toAddress) {
            throw new TronException('Sender and receiver addresses cannot be the same');
        }

        $response = $this->tronClient->client->post('/wallet/createtransaction', [
            'json' => [
                'owner_address' => $fromAddress,
                'to_address' => $toAddress,
                'amount' => Utils::toTron($amount),
                ...(!empty($message) ? [
                    'extra_data' => Utils::utf8toHex($message)
                ] : [])
            ],
        ]);
        $response = json_decode($response->getBody()->getContents(), true);

        $transaction = $this->signTransaction($response, $message);
        $broadcastTransaction = $this->broadcastTransaction($transaction);


        return array_merge($broadcastTransaction, $transaction);
    }

    private function signTransaction(array $transaction, string $message = null): array
    {
        if (isset($transaction['Error'])) throw new TronException($transaction['Error']);

        if (isset($transaction['signature'])) throw new TronException('Transaction is already signed');

        if (!empty($message)) {
            $transaction['raw_data']['data'] = Utils::utf8toHex($message);
        }

        $signature = Secp::sign($transaction['txID'], $this->privateKey);
        $transaction['signature'] = [$signature];

        return $transaction;
    }

    private function broadcastTransaction(array $signedTransaction): array
    {
        if (!array_key_exists('signature', $signedTransaction) || !is_array($signedTransaction['signature'])) {
            throw new TronException('Transaction is not signed');
        }

        $response = $this->tronClient->client->post('/wallet/broadcasttransaction', [
            'json' => $signedTransaction,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

}
