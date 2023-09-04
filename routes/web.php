<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
/*Route::get('/inventario', function () {
    return view('inventario.index');
});*/
//Route::get('/inventario',[InventarioController::class,'index']);

//'register'=>false,
Route::resource('empresas', EmpresasController::class)->middleware('auth');
Route::resource('inventario',InventarioController::class)->middleware('auth');
Route::resource('usuarios',UsuariosController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [InventarioController::class, 'show'])->name('home');
Route::group(['middleware'=> 'auth'], function (){
    Route::get('/', [InventarioController::class, 'show'])->name('home');
});

//https://www.youtube.com/watch?v=9DU7WLZeam8 enlace del video donde estoy aprendiendo hacer esto