<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobsController;

Route::get('/', [CurriculumController::class, 'testAPI']);
// Apenas teste

// curriculum
Route::get('/all/curriculum', [CurriculumController::class, 'all']);
Route::get('/find/curriculum/{id}', [CurriculumController::class, 'findByID']);

// users
Route::get('/all/users', [UserController::class, 'index']);
Route::get('/all/users-admins', [UserController::class, 'findAdmin']);

// Jobs
Route::get('/all/job-vacancies', [JobsController::class, 'all']);
Route::get('/all/job-vacancies/{department}', [JobsController::class, 'findByDepartment']);
Route::get('/all/job-vacancies-by-category/{category}', [JobsController::class, 'findByDepartmentCategories']);


// Create
Route::post('/add-job', [JobsController::class, 'createJobVacancies']);
Route::get('/add-jobTeste', [JobsController::class, 'createJobVacancies']);
Route::post('/send', [CurriculumController::class, 'validateCurriculum']);