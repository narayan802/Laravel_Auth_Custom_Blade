<?php

use App\Http\Controllers\DeshboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/register', [RegisterController::class, 'store'])->name('store');
Route::Post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('authCheaking')->group(function () {
    Route::get('/dashboard', [DeshboardController::class, 'showdata'])->name('dashboard');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('userlogout');

    Route::get('/adddpt', [DeshboardController::class, 'addedpt'])->name('add_depy');
    Route::Post('/adddpt', [DeshboardController::class, 'savedpt'])->name('add_depy');

    Route::get('/emp', [DeshboardController::class, 'empform'])->name('emp');

    Route::post('/addemp', [DeshboardController::class, 'save'])->name('saveemp');
});