<?php


use Illuminate\Database\Seeder;
use App\Cartera;
use App\PlanDesarrollo;
use App\Producto;
use App\Programa;
use App\Sector;
use App\SubPrograma;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CarteraSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(PlanDesarrolloSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(ProgramaSeeder::class);
        $this->call(SubProgramaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(EmpresaSeeder::class);
    }
}
