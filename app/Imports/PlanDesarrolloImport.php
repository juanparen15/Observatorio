<?php

namespace App\Imports;

use App\PlanDesarrollo;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;


class PlanDesarrolloImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PlanDesarrollo([
            'id'=>$row[0],
            'anno'=>$row[1],
            'nomPD'=>$row[2],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
