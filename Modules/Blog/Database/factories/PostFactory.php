<?php

use Faker\Generator as Faker;
use Modules\Blog\Entities\Post;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(6, true);
    return [
        'title' => $title,
        'description' => $faker->sentence(10, true),
        'content' => $faker->text(200),
        'slug' => $title,
        'status' => $faker->numberBetween(0, 2),
        'published_at' => $faker->dateTimeThisYear('now', null)
    ];
});
