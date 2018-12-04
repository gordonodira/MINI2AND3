<?php

use Faker\Generator as Faker;

$factory->define(App\Roles::class, function (Faker $faker) {
    return [
        'name' => 'Author',
        'slug' => 'author',
        'permissions' => 'true',

    ];
});
