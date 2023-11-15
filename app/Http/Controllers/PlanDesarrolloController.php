<?php

namespace App\Http\Controllers;

use App\PlanDesarrollo;
use Illuminate\Http\Request;
use App\Http\Requests\PlanDesarrollo\StoreRequest;
use App\Http\Requests\PlanDesarrollo\UpdateRequest;
use Illuminate\Support\Str;

class PlanDesarrolloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:admin.plandesarrollo.store',
            'permission:admin.plandesarrollo.index',
            'permission:admin.plandesarrollo.create',
            'permission:admin.plandesarrollo.update',
            'permission:admin.plandesarrollo.destroy',
            'permission:admin.plandesarrollo.edit',
        ]);
    }

    public function index()
    {
        $planesdesarrollo = PlanDesarrollo::get();
        return view('admin.plandesarrollo.index', compact('planesdesarrollo'));
    }


    public function create()
    {
        return view('admin.plandesarrollo.create');
    }


    public function store(StoreRequest $request)
    {
        PlanDesarrollo::create([
            'anno' => $request->anno,
            'nomPD' => $request->nomPD,
            'slug' => Str::slug($request->nomPD, '-')
        ]);
        return redirect()->route('admin.plandesarrollo.index')->with('flash', 'registrado');
    }


    public function show(PlanDesarrollo $planesdesarrollo)
    {
        return view('admin.plandesarrollo.show', compact('planesdesarrollo'));
    }


    public function edit(PlanDesarrollo $planesdesarrollo)
    {
        return view('admin.plandesarrollo.edit', compact('planesdesarrollo'));
    }


    public function update(UpdateRequest $request, PlanDesarrollo $planesdesarrollo)
    {
        $planesdesarrollo->update([
            'anno' => $request->anno,
            'nomPD' => $request->nomPD,
            'slug' => Str::slug($request->nomPD, '-')
        ]);
        return redirect()->route('admin.plandesarrollo.index')->with('flash', 'actualizado');
    }


    public function destroy(PlanDesarrollo $planesdesarrollo)
    {
        $planesdesarrollo->delete();
        return redirect()->route('admin.plandesarrollo.index')->with('flash', 'eliminado');
    }
}
