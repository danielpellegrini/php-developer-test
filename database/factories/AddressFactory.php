<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'country' => $faker->country
    ];
});
