<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ResponsavelController;
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

//crud categoria
Route::get('/categoria', action: [CategoriaController::class, 'index']) -> name('categorias.index');
Route::get('/categoria/create', action: [CategoriaController::class, 'create']) -> name('categorias.create');
Route::post('/categoria', action: [CategoriaController::class, 'store']) -> name('categorias.store');

//crud responsavel
Route::get('/responsavel', action: [ResponsavelController::class, 'index']) -> name('responsavel.index');
Route::get('/responsavel/create', action: [ResponsavelController::class,'create']) -> name('responsavel.create');
Route::post('/responsavel', action: [ResponsavelController::class,'store']) -> name('responsavel.store');



