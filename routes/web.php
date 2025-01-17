<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\TrainerController;
use App\Http\Controllers\Auth\TraineeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PayementController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/payment/{id}',[PayementController::class, 'viewtrainerdetail'])->name('payment');
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/trainer', [TrainerController::class, 'trainer']);
Route::post('/trainer', [TrainerController::class, 'trainerdatarecored']);

Route::middleware(['auth'])->group(function () {
Route::get('/trainee', [TraineeController::class, 'trainee'])->name('tranee');
Route::post('/trainee', [TraineeController::class, 'traineedatarecored'])->name('registrainer');
Route::post('/trainee/invite', [TraineeController::class, 'invitationtotrainer'])->name('sendInvitation');
});

Route::middleware(['guest'])->group(function () {
Route::get('/login', [LoginController::class, 'welcomelogin'])->name('login');
Route::post('/login', [LoginController::class, 'checkvalidation'])->name('loginsubmit');

Route::get('/register', [RegisterController::class, 'registerview']);
Route::post('/register', [RegisterController::class, 'registeruser'])->name('registeruser');
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });