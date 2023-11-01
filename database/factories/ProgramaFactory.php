<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sector;
use App\Programa;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Programa::class, function (Faker $faker) {
    $nomProg = $this->faker->unique()->word(20);
    return [
        'codProg'=>$this->faker->text(40),
        'nomProg'=> $nomProg,
        'slug'=> Str::slug($nomProg),
        'fK_sector'=> Sector::all()->random()->id
    ];
});
