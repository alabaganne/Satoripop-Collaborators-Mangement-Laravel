<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

use Illuminate\Support\Facades\Hash;

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
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        'password' => Hash::make('password'),
        // 'remember_token' => Str::random(10),
        'phone_number' => $faker->randomNumber(8),
        'date_of_birth' => $faker->dateTime,
        'address' => $faker->sentence(4),
        'civil_status' => $faker->randomElement(['single', 'married']),
        'gender' => $faker->randomElement(['male', 'female']),
        'id_card_number' => $faker->randomNumber(8),
        'nationality' => $faker->word,
        'university' => $faker->sentence(4),
        'history' => $faker->sentence(4),
        'experience_level' => $faker->randomNumber(1),
        'source' => $faker->word,
        'position' => $faker->sentence(3),
        'grade' => $faker->word,
        'hiring_date' => now(),
        'contract_end_date' => $faker->dateTime(mktime(date('Y') + 20)),
        'allowed_leave_days' => random_int(10, 30),
        // 'department_id' => rand(1, count(App\Models\Department::all())),
        'department_id' => rand(1, 5),
    ];
});
