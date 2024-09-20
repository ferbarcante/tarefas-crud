<?php

use App\Http\Controllers\CategoriaController;
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



