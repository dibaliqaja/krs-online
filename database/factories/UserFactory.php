<?php

// /** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function () {
    return [
        'username' => '111',
        'name' => 'Administrator',
        'email' => 'admin@krs.com',
        'password' => Hash::make('111'),
        'role' => 'admin'
    ];
});
