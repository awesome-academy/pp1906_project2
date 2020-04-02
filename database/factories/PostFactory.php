<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $userId = User::all()->random()->id;

    return [
        'user_id' => $userId,
        'content' => $faker->text($maxNbChars = 200),
        'type' => rand(1, 4),
    ];
});
