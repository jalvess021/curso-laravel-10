<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;


Route::get('/contato', [SiteController::class, 'contact']);
//o parametro dinamico tem q ser declarado por ultimo, se nao entende que tudo depois da barra é dinamico

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/supports', SupportController::class);
    Route::resource('/teste', TesteController::class);
});

require __DIR__.'/auth.php';






