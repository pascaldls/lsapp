<?php

use Faker\Generator as Faker;

// Company::all()->pluck('name')
// factory(\App\Company::class, 10 )->create()

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => $faker->phoneNumber
    ];
});
