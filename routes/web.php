<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [
    AuthController::class, 'loginForm'
])->name('login');

Route::post('/login', [
    AuthController::class, 'login'
]);

Route::post('/logout', [
    AuthController::class, 'logout'
])->name('logout');



Route::get('/usuarios/create', [
    UsuarioController::class, 'create'
])->name('usuarios.create');

Route::post('/usuarios', [
    UsuarioController::class, 'store'
])->name('usuarios.store');


Route::middleware(['auth','admin'])->group(function () {

    Route::get('/usuarios/admin/create', [UsuarioController::class, 'createAdmin'])->name('usuarios.createAdmin');
    Route::post('/usuarios/admin', [UsuarioController::class, 'storeAdmin'])->name('usuarios.storeAdmin');

});


Route::middleware('auth')->group(function () {

    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');

    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');

    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

});