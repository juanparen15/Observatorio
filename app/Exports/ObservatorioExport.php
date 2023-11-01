<?php

namespace App\Exports;

use App\Observatorio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class PlanadquisicioneExport implements FromCollection
class ObservatorioExport implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $plan = Observatorio::find($this->id);
        return view('admin.observatorio.plantilla_de_excel', [
            'plan' => $plan
        ]);
    }
}
