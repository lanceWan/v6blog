<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(rand(3,8), true),
        'body' => $faker->paragraphs(rand(3,8), true),
        'status' => 1,
        'view' => rand(10,100),
    ];
});
