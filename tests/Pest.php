<?php


use ArdaGnsrn\Tron\Tron;
use ArdaGnsrn\Tron\TronNetwork;

$tron = new Tron(TronNetwork::MAINNET);
//$response = $tron->accounts()->balance('TT5o5iDvA9yzYXCUA6kwY9cBmrX6XqyCZe');
$response = $tron->accounts()->transactions('TT5o5iDvA9yzYXCUA6kwY9cBmrX6XqyCZe');
var_dump("aaa");
var_dump($response);
