<?php

use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/questions/{level}', [QuestionController::class, 'getQuestions']);
Route::get('/choices/{question_id}', [ChoiceController::class, 'getChoices']);
