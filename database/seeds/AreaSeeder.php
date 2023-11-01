<?php

use Illuminate\Database\Seeder;
use App\Area;
use Illuminate\Support\Str;
class AreaSeeder extends Seeder
{
   
    public function run()
    {      
        //factory(Area::class)->times(10)->create();
        Area::create([
            'codA'=>'',
            'nomA'=>'Área de Almacén',
            'slug'=>'Área de Almacén',
            'fK_car'=>'5',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Área De Sistemas',
                'slug'=>'Área De Sistemas',
                'fK_car'=>'5',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Área De Personal',
                'slug'=>'Área De Personal',
                'fK_car'=>'5',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Área De Archivo',
                'slug'=>'Área De Archivo',
                'fK_car'=>'5',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Área De Vivienda',
                'slug'=>'Área De Vivienda',
                'fK_car'=>'8',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Área De Salud',
                'slug'=>'Área De Salud',
                'fK_car'=>'4',
            ]);
            
            Area::create([
                'codA'=>'',
                'nomA'=>'Comisaria De Familia',
                'slug'=>'Comisaria De Familia',
                'fK_car'=>'3',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Área De Cultura',
                'slug'=>'Área De Cultura',
                'fK_car'=>'4',
            ]);
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Cuerpo De Bomberos',
                'slug'=>'Cuerpo De Bomberos',
                'fK_car'=>'3',
            ]);      
    
            Area::create([
                'codA'=>'',
                'nomA'=>'Biblioteca Pública Municipal',
                'slug'=>'Biblioteca Pública Municipal',
                'fK_car'=>'4',
            ]);
            
            Area::create([
                'codA'=>'',
                'nomA'=>'No Aplica',
                'slug'=>'No Aplica',
                //'dependencia_id'=>
            ]);
    }
}
