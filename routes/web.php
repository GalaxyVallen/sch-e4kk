<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\UserController;

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

Route::get('/', [OverviewController::class, 'index']);
// Route::get('/tv/$id',);
Route::get('/movie/{id}', [MovieController::class, 'index']);


Route::middleware('guest')->prefix('auth')->group(function () {
  Route::view('/join', 'auth.signup', ['title' => 'Sign Up'])->name('register');
  Route::view('/login', 'auth.signin', ['title' => 'Sign In'])->name('login');
  
  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/join', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/{username}', [UserController::class, 'show'])->name('user');
});
