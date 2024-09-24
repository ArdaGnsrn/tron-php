<?php

namespace ArdaGnsrn\Tron;

use ArdaGnsrn\Tron\Support\Base58Check;

/**
 *
 */
class Utils
{
    /**
     * Convert hex to address
     *
     * @param string $address
     * @return string
     */
    public static function addressToHex(string $address): string
    {
        if (strlen($address) == 42 && mb_strpos($address, '41') == 0) {
            return $address;
        }
        return Base58Check::decode($address, 0, 3);
    }

    /**
     * Convert float to trx format
     *
     * @param $double
     * @return int
     */
    public static function toTron($double): int
    {
        return (int)bcmul((string)$double, (string)1e6, 0);
    }

    /**
     * Convert string to hex
     *
     * @param $sUtf8
     * @return string
     */
    public static function utf8toHex($sUtf8): string
    {
        return bin2hex($sUtf8);
    }
}
