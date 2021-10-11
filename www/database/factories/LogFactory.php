<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Log;
use Faker\Generator as Faker;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'link' => $faker->url,
        'link_type_id' => $faker->unique()->numberBetween(1, 5),
        'customer_id' => $faker->unique()->randomDigitNotNull,
        'created_at' => $faker->unique()->date($format = 'Y-m-d H:i:s', $max = 'now'),
    ];
});
