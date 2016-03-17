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
        'username' => $faker->userName,
        'email' => $faker->email,
        'avatar' => 'http://res.cloudinary.com/johnkariuki/image/upload/v1457982393/y9doba4mv488u7s4pzfx.jpg',
        'provider_id' => 'traditional',
        'provider' => 'traditional',
        'about' => $faker->text,
        'password' => bcrypt('12345'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(LearnParty\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(LearnParty\Video::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'url' => 'https://www.youtube.com/watch?v=pLs4Tex0U1U',
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'user_id' => 1,
        'views' => 10
    ];
});

$factory->define(LearnParty\Comment::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->sentence,
        'video_id' => rand(1, 11),
        'user_id' => 1,
    ];
});

$factory->define(LearnParty\Favorite::class, function (Faker\Generator $faker) {
    return [
        'video_id' => rand(1, 11),
        'user_id' => 1,
    ];
});
