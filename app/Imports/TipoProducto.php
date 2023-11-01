<?php

namespace App\Imports;

use App\TipoProducto;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;


class TipoProductomport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TipoProducto([
            'id'=>$row[0],
            'nomProd'=>$row[1],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
