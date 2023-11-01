<?php

namespace App\Exports;


use App\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class PlanadquisicioneExport implements FromCollection
class ProductoExport implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $plan = Producto::find($this->id);
        return view('admin.producto.plantilla_de_excel', [
            'plan' => $plan
        ]);
    }
}
