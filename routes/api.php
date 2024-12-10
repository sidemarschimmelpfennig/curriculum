<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CurriculumController,
    JobController,
    LoginController,
    AdminController
};

Route::prefix('auth')->group(function () {

    Route::get('/login-page', function (){ return view('login'); });
    Route::post('/login', [LoginController::class, 'login']);
        Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['CheckUser'])->group(function () {
    // Rotas candidatos
    Route::prefix('v1')->group(function () {
        Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
        Route::get('/all/job-vacancies-by-department/{department}', [JobController::class, 'findByDepartment']);
        Route::get('/all/job-vacancies-by-category/{category}', [JobController::class, 'findByDepartmentCategories']);
        Route::get('/all/job-vacancies-by-status/{status}', [JobController::class, 'findByStatus']);
        Route::post('/send-curriculum', [CurriculumController::class, 'send']);
        Route::post('/create', [CurriculumController::class, 'create']);
    });

    // Rotas Administrativas
    Route::prefix('v1/admin')->group(function () {
        Route::get('/all/job-vacancies', [JobController::class, 'getAll']);
        Route::post('/add-job', [JobController::class, 'createJob']);
        Route::post('/add-departament', [JobController::class, 'createDepartament']);
        Route::post('/add-departament_category', [JobController::class, 'createDepartamentCategory']);
        Route::post('/add-status', [JobController::class, 'createStatus']);
        Route::get('/newJobVacancy', [AdminController::class, 'view']);
        //Route::get('/send-file', fn () => view('file'));
    });
});