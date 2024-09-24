<?php

namespace ArdaGnsrn\Tron\Contracts;

interface TransactionContract
{
    public function create(string $toAddress, float $amount, string $message = null);
}
