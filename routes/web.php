<?php

use App\Http\Controllers\{RegisterController,
    LoginController,
    TransactionController,
    CategoryController,
    UserController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('transacoes.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/transacoes', TransactionController::class);

    Route::resource('/categorias', CategoryController::class);

    Route::resource('/configuracoes', UserController::class);
});

Route::resource('/registrar', RegisterController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/login/destroy', [LoginController::class, 'destroy'])->name('login.destroy');
