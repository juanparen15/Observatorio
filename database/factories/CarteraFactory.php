<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cartera;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Cartera::class, function (Faker $faker) {
    $nomCar = $this->faker->unique()->word(20);
    return [
        'codC' => $this->faker->text(40),
        'nomCar' => $nomCar,
        'slug' => Str::slug($nomCar)
    ];
});
