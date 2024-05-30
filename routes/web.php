<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('registered');

Route::post('/register', [UserController::class, 'register'])->name('user.enter');

Route::get('/gamestart', [UserController::class, 'home'])->name('gamestart')->middleware('auth');

Route::get('/gamestart2', [UserController::class, 'home2'])->name('gamestart2')->middleware('auth');

Route::get('/gamestart3', [UserController::class, 'home3'])->name('gamestart3')->middleware('auth');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/users/{level}/{score}/{type}', [UserController::class, 'storeScores']);

Route::get('/proceedto3', [UserController::class, 'storeScore2']);

Route::get('/leaderboards', [UserController::class, 'leaderboards']);
