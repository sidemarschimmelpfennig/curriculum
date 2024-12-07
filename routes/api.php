<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ViewController;

// Rotas candidatos
Route::prefix('v1')->middleware('check.user')->group(function (){

    Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
    Route::get('/all/job-vacancies-by-id/{id}', [JobController::class, 'findByID']);
    Route::get('/all/job-vacancies-by-department/{department}', [JobController::class, 'findByDepartment']);
    Route::get('/all/job-vacancies-by-category/{category}', [JobController::class, 'findByDepartmentCategories']);
    Route::get('/all/job-vacancies-by-status/{status}', [JobController::class, 'findByStatus']);
    Route::post('/add-job', [JobController::class, 'create']);

    // Enviar currículo
    Route::post('/send-curriculum', [CurriculumController::class, 'send']);

});

// Rotas Administrativas
Route::prefix('v1/admin')->middleware('check.user')->group(function (){
    
    Route::get('/newJobVacancy', function () {return view('newJobVacany');});
    Route::get('/send-file', function () {return view('file');});

});