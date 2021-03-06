<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;


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
    return view('auth.login');
});



Auth::routes();
Route::group(['middleware'=>['auth']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles','RoleController');
    Route::resource('usuarios','UsuarioController');
    Route::resource('vehiculos','VehiculoController');
    Route::get('/vehiculos/perfil/{vehiculo}', 'VehiculoController@show')->name('vehiculo.perfil');
    Route::resource('modelos','ModeloController');
    Route::resource('tipos','TipoVehiculoController');
    //Rutas agenda
     Route::post('/home/agregar', [App\Http\Controllers\EventoController::class, 'store']);
     Route::post('/home/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
     Route::post('/home/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
     Route::post('/home/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
     Route::post('/home/eliminar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
     //Rutas indicentes
    Route::resource('incidentes','incidenteController');
    //Rutas Marcas
    Route::resource('marcas', 'MarcaController');
    //Ruta Gastos
    Route::resource('gastos','GastoController');
<<<<<<< HEAD
    //Rutas Modulo Mantenimiento
    Route::resource('servicios','mantenimientoController');

=======
  //Ruta Conductor
    Route::resource('conductores', 'ConductorController');
>>>>>>> 8b4a69a5fe5b1330cc1f9c935241fea9cb88f1f6
});


