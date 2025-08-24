<?php

use core\Validator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBeTrue()
        ->and(Validator::string(false))->toBeFalse()
        ->and(Validator::string(''))->toBeFalse();
});

it('validates a string with a min len', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse()
        ->and(Validator::email('foo@bar.com'))->toBeTrue();
});

it('validates that a number is greater than a given amount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue()
        ->and(Validator::greaterThan(10, 100))->toBeFalse();
})->only();