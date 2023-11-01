<?php

namespace App\Imports;

use App\Sector;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class SectorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sector([
            'id'=>$row[0],
            'fK_pDes'=>$row[1],
            'codS'=>$row[2],
            'nomS'=>$row[3],
            'slug'=> Str::slug($row[0])
        ]);
    }
}
