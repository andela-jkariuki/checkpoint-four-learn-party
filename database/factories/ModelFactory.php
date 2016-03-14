<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(LearnParty\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName
        'email' => $faker->email,
        'avatar' => 'http://res.cloudinary.com/johnkariuki/image/upload/v1457982393/y9doba4mv488u7s4pzfx.jpg'
        'provider_id' => 'traditional',
        'provder' => 'traditional',
        'about' => $faker->text,
        'password' => bcrypt('12345'),
        'remember_token' => str_random(10),
    ];
});
