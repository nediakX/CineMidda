<?php

use App\Http\Controllers\AdministracionUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionController;

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

Route::get('/', [FuncionController::class, 'showWelcome'])->name('welcome');

Route::get('/Funciones/create', [FuncionController::class, 'create'])
    ->name('Funciones.create');

Route::get('/Funciones/{id}', [FuncionController::class, 'show'])->name('Funciones.show');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('/Funciones', FuncionController::class);

    Route::delete('/Funciones/{funcion}', 'FuncionController@destroy')->name('Funciones.destroy');

    Route::get('/dashboard', [FuncionController::class, 'validarReservas'])->name('dashboard');

    Route::get('/administracion-user', [AdministracionUserController::class, 'index'])->name('administracion-user.index');
    Route::get('/administracion-user/{id}/edit', [AdministracionUserController::class, 'edit'])->name('administracion-user.edit');
    Route::put('/administracion-user/{id}', [AdministracionUserController::class, 'update'])->name('administracion-user.update');
    Route::delete('/administracion-user/{id}', [AdministracionUserController::class, 'destroy'])->name('administracion-user.destroy');


    Route::delete('/Funciones/destroyReserva/{id}', [FuncionController::class, 'destroyReserva'])->name('Funciones.destroyReserva');
});

Route::get('/Funciones/{id}/reservar', [FuncionController::class, 'reservarAsientos'])->name('Funciones.reservar');

Route::post('/Funciones/{id}/reservar', [FuncionController::class, 'guardarReserva'])->name('funciones.guardarReserva');

Route::post('/Funciones/{id}/ingresardatos', [FuncionController::class, 'ingresardatos'])->name('Funciones.ingresardatos');

Route::get('/Cartelera', [FuncionController::class, 'cartelera'])->name('cartelera');
