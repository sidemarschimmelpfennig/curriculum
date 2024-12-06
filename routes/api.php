<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

Route::prefix('v1')->group(function (){
    // Jobs
    Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
    Route::get('/all/job-vacancies-by-id/{id}', [JobController::class, 'findByID']);
    Route::get('/all/job-vacancies-by-department/{department}', [JobController::class, 'findByDepartment']);
    Route::get('/all/job-vacancies-by-category/{category}', [JobController::class, 'findByDepartmentCategories']);
    Route::get('/all/job-vacancies-by-status/{status}', [JobController::class, 'findByStatus']);
    Route::post('/add-job', [JobController::class, 'create']);
    
    // Users
    Route::get('/all/users', [UserController::class, 'getAll']);
    Route::post('/add-user', [UserController::class, 'create']);

    Route::post('/send-curriculum', [CurriculumController::class, 'send']);
    // Teste     ->middleware('check.login'); // Apply the middleware here

    Route::post('/update-status/{id}', [JobController::class, 'update']);

    Route::get('/helloWorld', function () {
        return view('helloWorld');
    });

    Route::get('/a', function () {
        return view('file');
    });
   
});
