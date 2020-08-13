<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hashtag;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Hashtag::class, function (Faker $faker) {
    return [
        'tag' => $faker->word,
        'feed_id' => $faker->numberBetween(1,50),
    ];
});
