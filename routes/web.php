<?php

use App\Empresa;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $empresa = Empresa::first();
    return view('welcome', compact('empresa'));
})->name('welcome');
Route::get('/vista', function () {
    return view('vista');
});
Route::resource('empresa', 'EmpresaController')->only([
    'index', 'edit', 'update'
])->names('empresa');
Route::resource('areas', 'AreaController')->except([
    'show',
])->names('admin.areas');
Route::resource('clases', 'ClaseController')->except([
    'show',
])->names('admin.clases');
Route::resource('carteras', 'CarteraController')->except([
    'show',
])->names('admin.carteras');
Route::resource('sector', 'SectorController')->except([
    'show',
])->names('admin.sectores');

Route::resource('producto', 'ProductoController')->names('productos');
// route::get('retirar_producto/{planadquisicione}/de/{producto}', 'PlanadquisicioneController@retirar_producto')->name('retirar_producto');
Route::get('exportar_productos_excel/{producto}', 'ProductoController@exportar_productos_excel')->name('exportar_productos_excel');
Route::resource('productos', 'ProductoController')->except([
    'show', 'destroy'
])->names('admin.productos');
Route::get('importar_datos', function () {
    return view('admin.importar_datos');
})->name('importar_datos');
Route::get('productos/{slug}/destroy', 'ProductoController@destroy')->name('admin.productos.destroy');
Route::resource('plan', 'PlanDesarrolloController')->except([
    'show',
])->names('admin.planesdesarrollo');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('obtener_sectores', 'AjaxController@obtener_sectores')->name('obtener_sectores');
Route::get('obtener_programas', 'AjaxController@obtener_programas')->name('obtener_programas');
Route::get('obtener_subprogramas', 'AjaxController@obtener_subprogramas')->name('obtener_subprogramas');
Route::get('obtener_productos', 'AjaxController@obtener_productos')->name('obtener_productos');

// route::get('planadquisiciones/{planadquisicion}/agregar_producto', 'PlanadquisicioneController@agregar_producto')->name('agregar_producto');
// route::post('planadquisiciones/{planadquisicion}/agregar_producto_store', 'PlanadquisicioneController@agregar_producto_store')->name('agregar_producto_store');
Route::resource('users', 'UsuarioController')->names('users');

// ================== rutas para importar datos 
Route::post('areas_import', 'ImportExcelController@areas_import')->name('areas.import.excel');
Route::post('carteras_import', 'ImportExcelController@carteras_import')->name('carteras.import.excel');
Route::post('productos_import', 'ImportExcelController@productos_import')->name('productos.import.excel');
Route::post('sectores_import', 'ImportExcelController@sectores_import')->name('sectores.import.excel');
Route::post('plandesarrollo_import', 'ImportExcelController@plandesarrollo_import')->name('planesdesarrollo.import.excel');
Route::post('programas_import', 'ImportExcelController@programas_import')->name('programas.import.excel');
Route::post('subprogramas_import', 'ImportExcelController@subprogramas_import')->name('subprogramas.import.excel');

//new
Route::get('producto-export', 'ProductoController@export')->name('productos.export');
Route::put('update-profile/{user}', 'UserController@updateProfile')->name('update.profile');
Route::get('producto/areas/{areaId}', 'ProductoController@indexByArea')->name('productos.indexByArea');
Route::get('producto/onlyadmin', 'ProductoController@showOnlyAdmin')->name('productos.showOnlyAdmin');
Route::get('producto', 'ProductoController@index')->name('productos.index');
Route::get('producto/area/{areaId}', 'ProductoController@indexByArea')->name('productos.indexByArea');

// Route::get('/chart', 'ChartController@handleChart')->name('inventarioDocumental.handleChart');
Route::get('/chart', [ChartController::class, 'chart'])->name('/chart');
// Route::get('home', [HomeController::class, 'index']);

