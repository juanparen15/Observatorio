<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use App\SubPrograma;
use App\TipoProducto;
use App\UnidadMedida;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Producto::class, function (Faker $faker) {
    $nomProd = $this->faker->unique()->word(20);
    return [
        'nomProd' => $nomProd,
        'codProd' => $this->faker->text(40),
        'iB' => $this->faker->text(40),
        'mCuatrienia' => $this->faker->text(40),
        'fK_uMed' => UnidadMedida::all()->random()->id,
        'fK_tProd' => TipoProducto::all()->random()->id,
        'fK_user' => User::all()->random()->id,
        'fK_sProg' => SubPrograma::all()->random()->id,
        'slug' => Str::slug($nomProd)
    ];
});
