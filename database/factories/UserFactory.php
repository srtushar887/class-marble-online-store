<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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


$factory->define(\App\category::class, function (Faker $faker) {
    return [
        'category_name' => "Category ".rand(0,100),
    ];
});


$factory->define(\App\tag::class, function (Faker $faker) {
    return [
        'tag_name' => "Tag ".rand(0,100),
    ];
});


$factory->define(\App\product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'category_id' => rand(3,12),
        'tag_id' => rand(3,12),
        'product_price' => rand(000,999),
        'image' => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT8uuhsfpCsbKE3GHFwysxOvOhs3LVRNYy68w&usqp=CAU",
        'sort_des' => $faker->paragraph,
        'long_desc' => $faker->paragraph,
    ];
});
