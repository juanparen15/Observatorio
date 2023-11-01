<?php

namespace App\Exports;


use App\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductoAllExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    

    public function view(): View
    {
        

        if (auth()->user()->hasRole('Admin')) {
            $planes = Producto::all();
        } else {
            $planes = Producto::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.productio.producto_all', [
            'productos' => $planes
        ]);
    }

}
