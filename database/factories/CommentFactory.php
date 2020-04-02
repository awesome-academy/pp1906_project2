<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $userId = User::all()->random()->id;
    $postId = Post::all()->random()->id;

    return [
        'user_id' => $userId,
        'post_id' => $postId,
        'parent_id' => rand(1, 4),
        'content' => $faker->text($maxNbChars = 200),
    ];
});
