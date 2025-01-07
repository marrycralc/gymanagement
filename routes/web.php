<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'welcomelogin']);
Route::post('/login', [LoginController::class, 'checkvalidation'])->name('loginsubmit');
Route::get('/register', [RegisterController::class, 'registerview']);
Route::post('/register', [RegisterController::class, 'registeruser'])->name('registeruser');
