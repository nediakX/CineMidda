<?php

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


Route::get('/Contacto', function () {
    return view('contacto');
})->name('contacto');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('/Funciones', FuncionController::class);


    Route::delete('/Funciones/{funcion}', 'FuncionController@destroy')->name('Funciones.destroy');


    Route::get('/Cartelera', function () {
        return view('cartelera');
    })->name('cartelera');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

