<?php

use Faker\Generator as Faker;
use App\Company;

$factory->define(App\Customers::class, function (Faker $faker) {
    return [
        'company_id' =>  factory(Company::class)->create()->id,
        'name' =>  $faker->name(),
        'email' => $faker->unique()->safeEmail(),
        'active' => rand(0, 1)
    ];
});
