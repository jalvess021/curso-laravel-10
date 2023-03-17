<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

Route::post('/supports', [SupportController::class, 'store']) -> name('supports.store');

Route::get('/supports/create', [SupportController::class, 'create']) -> name('supports.create');

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');    

Route::get('/contato', [SiteController::class, 'contact' /*método*/]);

Route::resource('/teste', TesteController::class);

Route::get('/', function () {
    return view('welcome');
});

