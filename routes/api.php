<?php

use App\Producto;
use App\SubPrograma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/subprograma', function () {
//         return datatables()->eloquent(SubPrograma::query())
//         ->addColumn('clase', function(SubPrograma $user) {
//                 return $user->clase->detclase;
//         })
//         ->addColumn('btn', 'admin.productos._actions')
//         ->rawColumns(['btn']) 
//         ->toJson();
// });
