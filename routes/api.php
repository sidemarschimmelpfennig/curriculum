<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobsController;

Route::get('/', [CurriculumController::class, 'testAPI']);
// Apenas teste


Route::get('/all/curriculum', [CurriculumController::class, 'all']);
Route::get('/find/curriculum/{id}', [CurriculumController::class, 'findByID']);


Route::get('/all/users', [UserController::class, 'index']);
Route::get('/all/users-admins', [UserController::class, 'findAdmin']);

Route::get('/all/job-vacancies', [JobsController::class, 'all']);

