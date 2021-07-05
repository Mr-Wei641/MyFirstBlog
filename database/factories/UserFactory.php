<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt('admin888'),
        'remember_token' => $faker->regexify('[A-Za-z0-9._%+-]{10}'),
        'profile' => $faker->imageUrl(),
        'intro' => $faker->realText()
    ];
});
