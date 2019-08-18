<?php

use Faker\Generator as Faker;
use Modules\Blog\Entities\Image;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1, true),
        'description' => $faker->sentence(10, true),
        'src' => $faker->imageUrl(),
        'class' => null,
    ];
});
