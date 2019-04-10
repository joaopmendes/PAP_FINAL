<?php

use Faker\Generator as Faker;

$factory->define(App\Blogpost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'message' => $faker->paragraph() . $faker->paragraph() . $faker->paragraph() . $faker->paragraph() . $faker->paragraph() . $faker->paragraph() . $faker->paragraph(),
    ];
});
