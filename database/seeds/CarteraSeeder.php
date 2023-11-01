<?php

use App\Cartera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cartera::create([
            'codC' => '',
            'nomCar' => 'CONTROL INTERNO',
            'slug' => Str::slug('CONTROL INTERNO', '-'),
        ]);

        Cartera::create([
            'codC' => '',
            'nomCar' => 'DESPACHO ALCALDE',
            'slug' => Str::slug('DESPACHO ALCALDE', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
          'nomCar'=> 'SECRETARIA DE GOBIERNO',
            'slug' => Str::slug('SECRETARIA DE GOBIERNO', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
            'nomCar'=> 'SECRETARIA DE DESARROLLO',
            'slug' => Str::slug('SECRETARIA DE DESARROLLO', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
          'nomCar'=> 'SECRETARIA GENERAL',
            'slug' => Str::slug('SECRETARIA GENERAL', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
            'nomCar'=> 'SECRETARIA DE HACIENDA',
            'slug' => Str::slug('SECRETARIA DE HACIENDA', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
            'nomCar'=> 'SECRETARIA DE OBRAS PUBLICAS',
            'slug' => Str::slug('SECRETARIA DE OBRAS PUBLICAS', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
            'nomCar'=> 'SECRETARIA DE PLANEACION',
            'slug' => Str::slug('SECRETARIA DE PLANEACION', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
            'nomCar'=> 'INSPECCION TRANSITO Y TRANSPORTE',
            'slug' => Str::slug('INSPECCION TRANSITO Y TRANSPORTE', '-'),
        ]);
        Cartera::create([
            'codC'=>'',
            'nomCar'=> 'UMATA',
            'slug' => Str::slug('UMATA', '-'),
        ]);
    }
}
