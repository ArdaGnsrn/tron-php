<?php

namespace ArdaGnsrn\Tron\Support;

class Tron
{
    /**
     * Convert trx to float
     *
     * @param $amount
     * @return float
     */
    public static function convert($amount): float
    {
        return (float)bcdiv((string)$amount, (string)1e6, 8);
    }
}
