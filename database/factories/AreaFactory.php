<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Area;
use App\Cartera;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Area::class, function (Faker $faker) {
    $nomA = $this->faker->unique()->word(20);
    return [
        'codA' => $this->faker->text(40),
        'nomA' => $nomA,
        'slug' => Str::slug($nomA),
        'fK_car' => Cartera::all()->random()->id
    ];
});
