<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlanDesarrollo;
use App\Sector;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Sector::class, function (Faker $faker) {
    $nomS = $this->faker->unique()->word(20);
    return [
        'codS'=>$this->faker->text(40),
        'nomS'=> $nomS,
        'slug'=> Str::slug($nomS),
        'fK_pDes'=> PlanDesarrollo::all()->random()->id
    ];
});
