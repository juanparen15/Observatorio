<?php

namespace App\Imports;

use App\UnidadMedida;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;


class UnidadMedidaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UnidadMedida([
            'id'=>$row[0],
            'nomUMed'=>$row[1],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
