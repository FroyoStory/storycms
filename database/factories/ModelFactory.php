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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'confirm_token'  => str_random(32),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(5, true),
        'slug' => str_slug($faker->sentence(5, true)),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'            => $faker->sentence(5, true),
        'slug'             => str_slug($faker->sentence(5, true)),
        'markdown'         => $faker->paragraph(50, true),
        'html'             => (new Parsedown)->text($faker->paragraph(50, true)),
        'is_featured'      => false,
        'is_page'          => false,
        'visibility'       => 'public',
        'published_at'     => Carbon\Carbon::now(),
        'meta_title'       => $faker->sentence(5, true),
        'meta_description' => $faker->sentence(5, true),
    ];
});
