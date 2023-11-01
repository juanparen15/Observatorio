<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Programa;
use App\SubPrograma;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SubPrograma::class, function (Faker $faker) {
  $nomSP = $this->faker->unique()->word(20);
  return [
    'codSP'=>$this->faker->text(40),
    'nomSP' => $nomSP,
    'slug' => Str::slug($nomSP),
    'fK_programa' => Programa::all()->random()->id
  ];
});
