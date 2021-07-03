<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'password' => bcrypt('admin888'),
        'email' => $faker->email,
        'profile' => $faker->imageUrl(),
        'intro' => $faker->realText()
    ];
});
