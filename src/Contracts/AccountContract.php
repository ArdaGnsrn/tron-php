<?php

namespace ArdaGnsrn\Tron\Contracts;

interface AccountContract
{
    public function create();

    public function balance(string $address): float;

    public function transactions(string $address, bool $onlyConfirmed = true, $limit = 20, $fingerprint = null): array;
}
