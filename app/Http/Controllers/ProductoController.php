<?php

namespace App\Http\Controllers;

use App\Area;
use App\Sector;
use App\Programa;
use App\SubPrograma;
use App\User;
use App\Exports\ProductoAllExport;
use App\Exports\ProductoExport;
use App\Producto;
use App\PlanDesarrollo;
use App\TipoProducto;
use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function __construct()
    {

        $this->middleware([
            'auth',
            'permission:productos.index'
        ]);
    }

    public function showOnlyAdmin()
    {
        $adminId = auth()->user()->id;
        $productos = Producto::where('fK_user', $adminId)->get();
        session()->put('showOnlyAdmin', true);

        return view('admin.productos.index', compact('productos'));
    }

    public function index()
    {

        if (auth()->user()->hasRole('Admin')) {
            $productos = Producto::paginate(13);
        } else {
            $productos = Producto::where('fK_user', auth()->user()->id)->paginate(13);
            // $planadquisiciones = Planadquisicione::get();
        }
        return view('admin.productos.index', compact('productos'));
    }

    public function indexByArea($areaId)
    {
        $areas = Area::findOrFail($areaId);
        $productos = Producto::where('area_id', $areaId)->get();

        return view('admin.productos.index', compact('productos', 'areas'));
    }




    public function create()
    {

        $userArea = auth()->user()->area; // Obtener el área asociada al usuario
        // $planesdesarrollo = PlanDesarrollo::get();
        $subprogramas = SubPrograma::get();
        $tipoproductos = TipoProducto::get();
        $unidadmedidas = UnidadMedida::get();
        $areas = collect([$userArea]); // Crear una colección con el área del usuario
        // $requiproyectos = Requiproyecto::get();
        // $requiproyectos = Requiproyecto::where('areas_id', auth()->user()->area->id)->pluck('detproyeto', 'id');
        return view('admin.productos.create', compact('subprogramas', 'tipoproductos', 'unidadmedidas', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fK_sProg' => ['required'],
            'fK_tProd' => ['required'],
            'fK_uMed' => ['required'],
            'fK_area' => ['required'],
            'codProd' => ['required'],
            'nomProd' => ['required'],
            'iB' => ['required'],
            'mCuatrienia' => ['required']

        ]);



        $slug = Str::slug($request->nomProd);

        // Verificar si ya existe un Producto con el mismo slug
        $counter = 1;
        while (Producto::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->nomProd . '-' . $counter, '-');
            $counter++;
        }

        // Obtén el último ID en la tabla y agrega 1 para generar un número de orden único
        $ultimoId = Producto::max('id') + 1;

        $slugWithId = $slug . '-' . $ultimoId;

        $productos = Producto::create(array_merge($request->all(), [
            'fK_user' => auth()->user()->id,
            'slug' => $slugWithId  // Utiliza el slug con el ID agregado
        ]));

        return redirect()->route('productos.index')->with('flash', 'registrado');
    }


    // public function show(Planadquisicione $inventario)
    // {
    //     return view('admin.planadquisiciones.show', compact('inventario'));
    // }

    public function show(Producto $producto)
    {
        $productos = Producto::with(
            'subprogramas',
            'tipoproductos',
            'unidadmedidas',
            'areas',
            'usuarios'
        )
            ->find($producto);

        return view('admin.productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $userArea = $producto->user->area; // Obtener el área asociada al usuario
        $planesdesarrollo = PlanDesarrollo::get();
        $subprogramas = SubPrograma::get();
        $tipoproductos = TipoProducto::get();
        $unidadmedidas = UnidadMedida::get();
        // $requiproyectos = Requiproyecto::where('areas_id', auth()->user()->area->id)->pluck('detproyeto', 'id');

        return view('admin.productos.edit', compact(
            'planesdesarrollo',
            'subprogramas',
            'tipoproductos',
            'unidadmedidas',
            'areas',
            'userArea'
        ));
    }




    public function update(Request $request, Producto $producto)
    {

        $request->validate([
            'fK_sProg' => ['required'],
            'fK_tProd' => ['required'],
            'fK_uMed' => ['required'],
            'fK_area' => ['required'],
            'codProd' => ['required'],
            'nomProd' => ['required'],
            'iB' => ['required'],
            'mCuatrienia' => ['required']
        ]);


        $slug = Str::slug($request->nomProd);

        // Verificar si el nuevo slug ya existe para otro registro
        $counter = 1;
        while (Producto::where('slug', $slug)->where('id', '<>', $producto->id)->exists()) {
            $slug = $slug . '-' . $counter;
            $counter++;
        }

        // Obtén el último ID en la tabla y agrega 1 para generar un número de orden único
        $ultimoId = Producto::max('id');

        $slugWithId = $slug . '-' . $ultimoId;

        $producto->update(array_merge($request->all(), [
            'fK_user' => auth()->user()->id,
            'slug' => $slugWithId  // Utiliza el slug con el ID agregado
        ]));

        // ... (código para manejar la relación muchos a muchos si es necesario)

        return redirect()->route('productos.index')->with('flash', 'actualizado');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('flash', 'eliminado');
    }

    // public function retirar_producto(Planadquisicione $planadquisicione,Producto $producto){
    //     $producto_id = $producto->id;

    //     $planadquisicione->productos()->detach($producto_id);
    //     return redirect()->route('planadquisiciones.show', $planadquisicione)->with('flash','actualizado');
    // }

    public function exportar_planadquisiciones_excel(Producto $producto)
    {

        return Excel::download(new ProductoExport($producto->id), 'Observatorio - ' . $producto->id . '.xlsx');
    }

    // public function agregar_producto(Producto $producto)
    // {
    //     $segmentos = Segmento::all();
    //     return view('admin.producto.agregar_producto', compact('planadquisicion', 'segmentos'));
    // }
    // public function agregar_producto_store(Request $request, Planadquisicione $planadquisicion)
    // {
    //     $planadquisicion->productos()->attach($request->producto_id);
    //     return redirect()->route('planadquisiciones.show', $planadquisicion)->with('flash', 'actualizado');
    // }
    public function export()
    {
        return Excel::download(new ProductoAllExport, 'Observatorio en General.xlsx');
    }
}
