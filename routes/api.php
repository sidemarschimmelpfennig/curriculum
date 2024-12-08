<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CurriculumController,
    JobController,
    LoginController

};
Route::prefix('register')->group(function () {
    // Apenas a view
    Route::get('/login-Page', function (){
        return view('login');

    });


    Route::get('/login', [LoginController::class, 'login']);

});

// Rotas candidatos
Route::prefix('v1')->middleware('check.user')->group(function (){

    Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
    Route::get('/all/job-vacancies-by-id/{id}', [JobController::class, 'findByID']);
    Route::get('/all/job-vacancies-by-department/{department}', [JobController::class, 'findByDepartment']);
    Route::get('/all/job-vacancies-by-category/{category}', [JobController::class, 'findByDepartmentCategories']);
    Route::get('/all/job-vacancies-by-status/{status}', [JobController::class, 'findByStatus']);
    // Enviar currículo
    Route::post('/send-curriculum', [CurriculumController::class, 'send']);
    Route::post('/create', [CurriculumController::class, 'create']);

});

// Rotas Administrativas
Route::prefix('v1/admin')->middleware('check.user')->group(function (){    
    Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
    Route::post('/add-job', [JobController::class, 'create']);
    
    Route::get('/send-file', function () {return view('file');});
    // Admin view
    Route::get('/newJobVacancy', function () {return view('newJobVacany');});

});