<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::get('/supports/create', [SupportController::class, 'create']) -> name('supports.create');
//o parametro dinamico tem q ser declarado por ultimo, se nao entende que tudo depois da barra é dinamico
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::post('/supports', [SupportController::class, 'store']) -> name('supports.store');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');    
Route::get('/contato', [SiteController::class, 'contact' /*método*/]);
Route::resource('/teste', TesteController::class);

// -> name() = nome da rota, podendo atualizar a url e continuar com o nome fixo 

Route::get('/', function () {
    return view('welcome');
});

