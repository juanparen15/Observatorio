<?php

namespace App\Imports;

use App\Area;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;


class AreaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Area([
            'id' => $row[0],
            'fK_car' => $row[1],
            'codA' => $row[2],
            'nomA' => $row[3],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
