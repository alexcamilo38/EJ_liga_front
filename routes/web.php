<?php

use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EntrenadorController;
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
//php artisan make:controller CargoController                 


Route::get('disciplinas/create', [DisciplinaController::class, 'create'])->name('disciplinas.create');
Route::get('disciplinas/list', [DisciplinaController::class, 'index'])->name('disciplinas.index');
Route::post('disciplinas/store', [DisciplinaController::class, 'salida'])->name('disciplinas.store');
Route::get('disciplinas/{id}', [DisciplinaController::class, 'show'])->name('disciplinas.show');
Route::put('disciplinas/{disciplinas}', [DisciplinaController::class, 'update'])->name('disciplinas.update');
Route::get('disciplinas/{disciplinas}/editar', [DisciplinaController::class, 'edit'])->name('disciplinas.edit');
Route::delete('disciplinas/{disciplinas}', [DisciplinaController::class, 'destroy'])->name('disciplinas.destroy');

Route::get('deportistas/create', [DeportistaController::class, 'create'])->name('deportistas.create');
Route::get('deportistas/list', [DeportistaController::class, 'index'])->name('deportistas.index');
Route::post('deportistas/store', [DeportistaController::class, 'salida'])->name('deportistas.store');
Route::get('deportistas/{id}', [DeportistaController::class, 'show'])->name('deportistas.show');
Route::put('deportistas/{deportistas}', [DeportistaController::class, 'update'])->name('deportistas.update');
Route::get('deportistas/{deportistas}/editar', [DeportistaController::class, 'edit'])->name('deportistas.edit');
Route::delete('deportistas/{deportistas}', [DeportistaController::class, 'destroy'])->name('deportistas.destroy');

Route::get('entrenadors/create', [EntrenadorController::class, 'create'])->name('entrenadors.create');
Route::get('entrenadors/list', [EntrenadorController::class, 'index'])->name('entrenadors.index');
Route::post('entrenadors/store', [EntrenadorController::class, 'salida'])->name('entrenadors.store');
Route::get('entrenadors/{id}', [EntrenadorController::class, 'show'])->name('entrenadors.show');
Route::put('entrenadors/{entrenadors}', [EntrenadorController::class, 'update'])->name('entrenadors.update');
Route::get('entrenadors/{entrenadors}/editar', [EntrenadorController::class, 'edit'])->name('entrenadors.edit');
Route::delete('entrenadors/{entrenadors}', [EntrenadorController::class, 'destroy'])->name('entrenadors.destroy');