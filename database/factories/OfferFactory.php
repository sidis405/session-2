<?php

use Acme\Domain\Models\User;
use Faker\Generator as Faker;
use Acme\Domain\Models\Offer;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'user_id' => factory(User::class),
    ];
});
