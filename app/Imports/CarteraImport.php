<?php

namespace App\Imports;

use App\Cartera;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class CarteraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cartera([
            'id'=> $row[0],
            'codC'=> $row[1],
            'nomCar'=> $row[2],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
