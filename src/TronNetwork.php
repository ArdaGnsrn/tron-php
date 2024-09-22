<?php

namespace ArdaGnsrn\Tron;

enum TronNetwork: string
{
    case MAINNET = 'https://api.trongrid.io';
    case SHASTA = 'https://api.shasta.trongrid.io';
    case NILE = 'https://nile.trongrid.io';
}
