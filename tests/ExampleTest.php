<?php

use ArdaGnsrn\Tron\Tron;
use ArdaGnsrn\Tron\TronNetwork;

it('can test', function () {
    $tron = new Tron(TronNetwork::SHASTA);

//    $response = $tron->addresses()->validate("TG3XXyExBkPp9nzdajDZsozEu4BkaSJozs");
//
//    print_r($response ? "Valid" : "Invalid");

//    $response = $tron->transactions()
//        ->setAddress('TJ97hyuw9H6kGmUj3hcsL4CpXYCKxzEch6')
//        ->setPrivateKey('7432072e29eee5507e75b3954c0d1d2c2713ae358a89e206257b0c0e76c8c989')
//        ->create('TGbdQSJKSuw7rrR7MDbdC6KkSaMphM6o3g', 10);
//
//    var_dump($response);


    $tron = new Tron(TronNetwork::MAINNET);
    $response = $tron->accounts()->balance('TT5o5iDvA9yzYXCUA6kwY9cBmrX6XqyCZe');
    var_dump("aaa");
    var_dump($response);

    die();

    expect(true)->toBeTrue();
});
