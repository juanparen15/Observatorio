<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UnidadMedida;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(UnidadMedida::class, function (Faker $faker) {
    $nomUMed = $this->faker->unique()->word(20);
        return [
            'nomUMed'=> $nomUMed,
            'slug'=> Str::slug($nomUMed)
    ];
});
