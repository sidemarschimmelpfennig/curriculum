<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

Route::prefix('v1')->group(function (){
    Route::get('/', [CurriculumController::class, 'testAPI']);
    // Apenas teste

    // curriculum
    Route::get('/all/curriculum', [CurriculumController::class, 'all']);
    Route::get('/find/curriculum/{id}', [CurriculumController::class, 'findByID']);

    // users
    Route::get('/all/users', [UserController::class, 'index']);
    Route::get('/all/users-admins', [UserController::class, 'findAdmin']);

    // Jobs
    Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
    Route::get('/all/job-vacancies-by-id/{id}', [JobController::class, 'findByID']);
    Route::get('/all/job-vacancies-by-department/{department}', [JobController::class, 'findByDepartment']);
    Route::get('/all/job-vacancies-by-category/{category}', [JobController::class, 'findByDepartmentCategories']);
    Route::get('/all/job-vacancies-by-status/{status}', [JobController::class, 'findByStatus']);
    Route::post('/add-job', [JobController::class, 'create']);

});
    