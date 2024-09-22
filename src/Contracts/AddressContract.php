<?php

namespace ArdaGnsrn\Tron\Contracts;

interface AddressContract
{
    public function validate(string $address): bool;
}
