<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\TrainerController;
use App\Http\Controllers\Auth\TraineeController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/trainer', [TrainerController::class, 'trainer']);
Route::post('/trainer', [TrainerController::class, 'trainerdatarecored']);

Route::get('/trainee', [TraineeController::class, 'trainee']);
Route::post('/trainee', [TraineeController::class, 'traineedatarecored']);
Route::get('/logout', function () {
    return view('login');
});
Route::get('/login', [LoginController::class, 'welcomelogin']);
Route::post('/login', [LoginController::class, 'checkvalidation'])->name('loginsubmit');
Route::get('/register', [RegisterController::class, 'registerview']);
Route::post('/register', [RegisterController::class, 'registeruser'])->name('registeruser');
