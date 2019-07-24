<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Post::class, function (Faker $faker) {

    $image = "Post_Image_" . rand(1, 5) . ".jpg";

    return [
        'author_id' => rand(1, 2),
        'title' => $faker->sentence(rand(8, 12)),
        'slug' => $faker->slug(),
        'excerpt' => $faker->sentence(rand(200, 250)),
        'body' => $faker->paragraphs(rand(10, 15), true),
        'image' => rand(0, 1) == 1 ? $image : NULL
    ];
});
