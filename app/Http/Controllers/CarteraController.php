<?php

namespace App\Http\Controllers;

use App\Cartera;
use Illuminate\Http\Request;
use App\Http\Requests\Dependencia\StoreRequest;
use App\Http\Requests\Dependencia\UpdateRequest;
use Illuminate\Support\Str;

class CarteraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.carteras.index',
            'permission:admin.carteras.store',
            'permission:admin.carteras.create',
            'permission:admin.carteras.destroy',
            'permission:admin.carteras.update',
            'permission:admin.carteras.edit'
        ]);
    }

    public function index()
    {
        $carteras = Cartera::get();
        return view('admin.carteras.index', compact('carteras'));
    }

    public function create()
    {
        return view('admin.carteras.create');
    }

    public function store(StoreRequest $request)
    {
        Cartera::create([
            'codC' => $request->codC,
            'nomCar' => $request->nomCar,
            'slug' => Str::slug($request->nomCar, '-'),
        ]);
        return redirect()->route('admin.dependencias.index')->with('flash', 'registrado');
    }

    public function show(Cartera $cartera)
    {
        return view('admin.carteras.show', compact('cartera'));
    }

    public function edit(Cartera $cartera)
    {
        return view('admin.carteras.edit', compact('cartera'));
    }

    public function update(UpdateRequest $request, Cartera $cartera)
    {
        $cartera->update([
            'codC' => $request->codC,
            'nomCar' => $request->nomCar,
            'slug' => Str::slug($request->nomCar, '-'),
        ]);
        return redirect()->route('admin.carteras.index')->with('flash', 'actualizado');
    }

    public function destroy(Cartera $cartera)
    {
        $cartera->delete();
        return redirect()->route('admin.carteras.index')->with('flash', 'eliminado');
    }
}
