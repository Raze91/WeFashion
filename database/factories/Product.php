<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        "name" => $faker->name(),
        "description" => $faker->paragraphs(1, true),
        "price" => $faker->randomFloat(2, 0, 99),
        "ref" => $faker->regexify("[A-Za-z0-9]{16}"),
        "discount" => $faker->boolean(),
    ];
});
