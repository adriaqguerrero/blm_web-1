<?php

use App\Http\Controllers\altaValidaCumplimiento;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\ClientesActivosController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ventasController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/usuarios/', [UsuariosController::class, 'index'])->name('user.index');
Route::get('/usuarios/nuevo', [UsuariosController::class, 'nuevousuario'])->name('user.create');
Route::post('/usuarios/save', [UsuariosController::class, 'store'])->name('user.store');
Route::get('/usuarios/actualizar/{user}', [UsuariosController::class, 'actualizarusuario'])->name('user.edit');
Route::put('/usuarios/updated/{user}', [UsuariosController::class, 'updated'])->name('user.updated');
Route::get('/usuarios/delete/{user}', [UsuariosController::class, 'delete'])->name('user.delete');
Route::get('/usuarios/reactivar/{user}', [UsuariosController::class, 'reactivar'])->name('user.reactivar');
Route::get('/usuarios/cambio-contrasenia/{user}', [UsuariosController::class, 'password_view'])->name('user.password');
Route::put('/usuarios/password/{user}', [UsuariosController::class, 'password'])->name('user.save-password');

Route::get('/clientesactivos', [ClientesActivosController::class, 'index']);
Route::get('/clientesactivos/nuevo', [ClientesActivosController::class, 'nuevousuario'])->name('cliente.create');
Route::get('/clientesactivos/clienteCotizaciones', [ClientesActivosController::class, 'clienteCotizaciones']);
Route::get('/ventas', [ventasController::class, 'indexventas']);
Route::get('/ventas/altaSolicitudCumplimiento', [ventasController::class, 'altaSolicitudCumplimiento']);
Route::get('/clientesactivos/CotizacionesNuevas', [ClientesActivosController::class, 'CotizacionesNuevas']);

Route::get('/cumplimiento/altaValidaCumplimiento', [altaValidaCumplimiento::class, 'index']);


//admin
Route::resource('/admin/permisos', PermisosController::class)->names('permisos');
Route::resource('/admin/roles', RoleController::class)->names('roles');
Route::get('/admin/bitacora', [BitacoraController::class,'index'])->name('bitacora');
Route::get('/admin/catalogos', [CatalogosController::class,'index'])->name('catalogo');

// bitacora-index
//rutas para livewire
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/livewire/livewire.js', $handle);
});
