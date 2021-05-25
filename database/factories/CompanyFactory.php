<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'description' => $faker->text(500)
    ];
});
