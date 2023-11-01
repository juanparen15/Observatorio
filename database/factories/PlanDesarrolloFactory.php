<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlanDesarrollo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(PlanDesarrollo::class, function (Faker $faker) {
    $nomPD = $this->faker->unique()->word(20);
        return [
            'anno'=>$this->faker->text(40),
            'nomPD'=> $nomPD,
            'slug'=> Str::slug($nomPD)
    ];
});
