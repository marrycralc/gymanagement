<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\TrainerController;
use App\Http\Controllers\Auth\TraineeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PayementController;
use App\Http\Controllers\Auth\checkoutController;
use App\Http\Controllers\Auth\WebhookController;
use App\Http\Controllers\Auth\GetupdateController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::post('/mailsend', [GetupdateController::class, 'mailupdate'])->name('mailupdate');
Route::get('/payment/{id}',[PayementController::class, 'viewtrainerdetail'])->name('payment');
Route::post('/checkout', [PayementController::class, 'dataforcheck'])->name('checkout.route');
Route::get('/checkout', function(request $request){
    // ddd($request);
    return view('checkout');
 });
 Route::post('/checkout_process', [checkoutController::class, 'checkout_process'])->name('checkoutp');
 Route::post('/webhook/payment_statusc', [WebhookController::class, 'checkstatus'])->name('checkstatus');

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