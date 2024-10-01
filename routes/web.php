<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\TarefaController;
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

Route::get('/home', function(){
    return view('home');
})->name('home');

Route::get('/categoria', action: [CategoriaController::class, 'index']) -> name('categorias.index');
Route::get('/categoria/create', action: [CategoriaController::class, 'create']) -> name('categorias.create');
Route::post('/categoria', action: [CategoriaController::class, 'store']) -> name('categorias.store');

Route::get('/responsavel', action: [ResponsavelController::class, 'index']) -> name('responsavel.index');
Route::get('/responsavel/create', action: [ResponsavelController::class,'create']) -> name('responsavel.create');
Route::post('/responsavel', action: [ResponsavelController::class,'store']) -> name('responsavel.store');

Route::get('/tarefa', action: [TarefaController::class,'index']) -> name('tarefa.index');
Route::get('/tarefa/create', action: [TarefaController::class, 'create']) -> name('tarefa.create');
Route::post('/tarefa', action: [TarefaController::class,'store']) -> name('tarefa.store');

Route::post('/tarefa/{id}/iniciar', [TarefaController::class, 'iniciar'])->name('tarefa.iniciar');
Route::post('/tarefa/{id}/pausar', [TarefaController::class, 'pausar'])->name('tarefa.pausar');
Route::post('/tarefa/{id}/finalizar', [TarefaController::class, 'finalizar'])->name('tarefa.finalizar');
Route::post('/tarefa/{id}/retomar', [TarefaController::class, 'retomar'])->name('tarefa.retomar');
Route::get('/tarefa/exibir', [TarefaController::class, 'exibir'])->name('tarefa.exibir');
