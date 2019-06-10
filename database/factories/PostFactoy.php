<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'       => User::inRandomOrder()->pluck('id')->first(),
        'title'         => $faker->unique()->sentence,
        'body'          => $faker->text
    ];
});
