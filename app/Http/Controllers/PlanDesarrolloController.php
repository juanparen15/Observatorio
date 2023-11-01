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
            'permission:admin.planesdesarrollo.store',
            'permission:admin.planesdesarrollo.index', 
            'permission:admin.planesdesarrollo.create',
            'permission:admin.planesdesarrollo.update',
            'permission:admin.planesdesarrollo.destroy',
            'permission:admin.planesdesarrollo.edit'
            ]);
    }
    public function index()
    {
        $planesdesarrollo = PlanDesarrollo::get();
        return view ('admin.planesdesarrollo.index',compact('planesdesarrollo'));
    }

    
    public function create()
    {
        return view ('admin.planesdesarrollo.create');
    }

    
    public function store(StoreRequest $request)
    {
        PlanDesarrollo::create([
            'anno'=> $request->anno,
            'nomPD'=> $request->nomPD,
            'slug'=> Str::slug($request->nomPD , '-')
        ]);
        return redirect()->route('admin.planesdesarrollo.index')->with('flash','registrado');
    }

    
    public function show(PlanDesarrollo $plandesarrollo)
    {
        return view ('admin.planesdesarrollo.show',compact('plandesarrollo'));
    }

   
    public function edit(PlanDesarrollo $plan)
    {
        return view ('admin.planesdesarrollo.edit',compact('plan'));
    }

   
    public function update(UpdateRequest $request, PlanDesarrollo $plan)
    {
        $plan->update([
            'anno'=> $request->anno,
            'nomPD'=> $request->nomPD,
            'slug'=> Str::slug($request->nomPD , '-')
        ]);
        return redirect()->route('admin.planesdesarrollo.index')->with('flash','actualizado');
    }

    
    public function destroy(PlanDesarrollo $plan)
    {
        $plan->delete();
        return redirect()->route('admin.planesdesarrollo.index')->with('flash','eliminado');
    }
}
