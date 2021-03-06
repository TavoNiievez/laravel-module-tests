<?php

declare(strict_types=1);

use App\Entity\User;
use Faker\Generator as Faker;
use LaravelDoctrine\ORM\Testing\Factory;
use Illuminate\Support\Str;

// Model Factories

$attributes = function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'secret',
        'remember_token' => Str::random(10),
    ];
};

/** @var Factory $factory */

$factory->define(User::class, $attributes);

$factory->defineAs(User::class, 'admin', $attributes);