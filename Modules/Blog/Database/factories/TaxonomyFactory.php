<?php

use Faker\Generator as Faker;
use Modules\Blog\Entities\Taxonomy;

$factory->define(Taxonomy::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'color' => $faker->hexcolor(),
        'slug' => $name,
        'tags' => $faker->boolean,
        // 'parent_id' => 0,
    ];
});
