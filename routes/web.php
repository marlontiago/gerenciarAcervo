<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/criar', [LivroController::class, 'criar'])->name('criar.index');
    Route::get('/listar', [LivroController::class, 'listar'])->name('listar.index');
    Route::get('/editar/{id}', [LivroController::class, 'edit'])->name('editar.livro');
    Route::get('/filtrar', [LivroController::class, 'filtrar'])->name('filtrar.index');

    Route::post('/criar', [LivroController::class, 'store'])->name('salvar.livro');
    Route::put('/editar/{id}', [LivroController::class, 'update'])->name('atualizar.livro');

    Route::delete('/listar/{id}', [LivroController::class, 'destroy'])->name('excluir.livro');
});



require __DIR__.'/auth.php';
