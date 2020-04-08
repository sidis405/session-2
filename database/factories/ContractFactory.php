<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Acme\Domain\Models\User;
use Acme\Domain\Models\Offer;
use Faker\Generator as Faker;
use Acme\Domain\Models\Contract;

$factory->define(Contract::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'offer_id' => factory(Offer::class),
        'user_id' => factory(User::class),
    ];
});
