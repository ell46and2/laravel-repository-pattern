<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $title = $faker->sentence(5),
        'slug' => str_slug($title),
    ];
});
