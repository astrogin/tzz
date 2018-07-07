<?php

use Faker\Generator as Faker;

$factory->define(\App\Record::class, function (Faker $faker) {
    return [
        'property_1' => $faker->name(),
        'property_2' => $faker->name(),
        'property_3' => $faker->name(),
        'property_4' => $faker->name(),
        'property_5' => $faker->name(),
        'property_6' => $faker->name(),
        'property_7' => $faker->name()
    ];
});
