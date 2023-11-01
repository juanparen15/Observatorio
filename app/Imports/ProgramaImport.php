<?php

namespace App\Imports;

use App\Programa;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class ProgramaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Programa([
            'id'=>$row[0],
            'fK_sector'=>$row[1],
            'codProg'=>$row[2],
            'nomProg'=>$row[3],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
