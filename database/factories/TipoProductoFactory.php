<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoProducto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(TipoProducto::class, function (Faker $faker) {
    $nomProd = $this->faker->unique()->word(20);
        return [
            'nomProd'=> $nomProd,
            'slug'=> Str::slug($nomProd)
    ];
});
