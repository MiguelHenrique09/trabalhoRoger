<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PostagemController;

Route::get('/', [PostagemController::class, 'index'])->name('home');




// Rotas de Categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'EditaCategoria'])->name('editaCategoria');
Route::post('/categorias', [CategoriaController::class, 'CriaCategoria'])->name('criaCategoria');
Route::post('/postagens', [PostagemController::class, 'CriaPostagem'])->name('criaPost');
Route::post('/comentarios', [ComentarioController::class, 'criaComentario'])->name('criaComentario');