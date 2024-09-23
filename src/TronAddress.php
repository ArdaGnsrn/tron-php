<?php

namespace ArdaGnsrn\Tron;

use Elliptic\EC;

class TronAddress
{
    protected string $privateKey;
    protected string $publicKey;

    protected string $addressHex;
    protected string $addressBase58;

    public function __construct($privateKey)
    {
        $keyPair = new EC\KeyPair::fromPrivate(new EC('secp256k1'), $privateKey);
    }

    public static function generate(): TronAddress
    {
        $ec = new EC('secp256k1');

        $key = $ec->genKeyPair();
        $privateKey = $ec->keyFromPrivate($key->priv);

        return new self($privateKey);
    }
}
