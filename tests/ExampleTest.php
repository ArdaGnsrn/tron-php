<?php

use ArdaGnsrn\Tron\Tron;

it('can test', function () {
    $tron = new Tron();

    $response = $tron->addresses()->validate("TG3XXyExBkPp9nzdajDZsozEu4BkaSJozs");

    print_r($response ? "Valid" : "Invalid");

    expect(true)->toBeTrue();
});
