<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class ProductoImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Producto([
            'id' => $row[0],
            'fK_sProg' => $row[1],
            'fK_tProd' => $row[2],
            'fK_uMed' => $row[3],
            'fK_area' => $row[4],
            'codProd' => $row[5],
            'nomProd' => $row[6],
            'iB' => $row[7],
            'mCuatrienia' => $row[8],
            // 'user_id'=> $row[9],
            'slug' => Str::slug($row[0])
        ]);
    }
}
