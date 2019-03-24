<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'blog_id'=> factory(\App\Blogpost::class)->create()->id,
        'user_id'=> factory(\App\User::class)->create()->id,
        'comment'=> $faker->sentence(),
    ];
});
