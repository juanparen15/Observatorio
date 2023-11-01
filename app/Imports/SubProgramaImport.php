<?php

namespace App\Imports;


use App\SubPrograma;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
class SubProgramaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubPrograma([
            'id'=>$row[0],
            'fK_programa'=>$row[1],
            'codSP'=>$row[2],
            'nomSP'=>$row[3],
            'slug'=> Str::slug($row[0]),
        ]);
    }
}
