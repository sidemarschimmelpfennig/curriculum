<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\{
    UserController,
    LoginController,
    
    CandidateController,
    DepartamentCategoryController,

    JobController,
    DepartamentController,
    MobilitiesController,
    SettingsController,
    SkillsController
};

// Rotas de E-mail
Route::get('/settings', [SettingsController::class, 'showForm'])->name('email.form');
Route::put('/settings', [SettingsController::class, 'update'])->name('email.update');
Route::put('/status/{candidateId}', [CandidateController::class, 'updateStatus']);

Route::prefix('v1')->group( function () {
    dump('Memória em uso: ' . memory_get_usage(true));
    Route::get('/jobs', [JobController::class, 'getAll']);
    Route::post('/create', [CandidateController::class, 'create']);


    Route::post('/job-apply', [CandidateController::class, 'curriculumApply']);
    Route::get('/apply', [JobController::class, 'apply']);

    Route::get('/login', [LoginController::class, 'getData']);
    Route::get('/logout', [LoginController::class, 'logout']);


    //Route::middleware('auth:sanctum')->group(function (){ 
        Route::prefix('/admin')->group(function (){    
            // + importante
            Route::get('/jobs', [JobController::class, 'getAll']);
            Route::post('/job', [JobController::class, 'create']);

            Route::delete('/departament/{id}', [DepartamentController::class, 'delete']);
            Route::delete('/user/{id}', [UserController::class, 'delete']);
            Route::delete('/candidate/{id}', [CandidateController::class, 'delete']);
        
            Route::get('/departament', [DepartamentController::class, 'getAll']);
            Route::put('/departament', [DepartamentController::class, 'update']);
            Route::post('/departament', [DepartamentController::class, 'create']);

            Route::get('/category', [DepartamentCategoryController::class, 'getAll']);
            Route::put('/category', [DepartamentCategoryController::class, 'update']);
            Route::post('/category', [DepartamentCategoryController::class, 'create']);

            Route::get('/skills', [SkillsController::class, 'create']);
            Route::put('/skills', [SkillsController::class, 'create']);
            Route::post('/skills', [SkillsController::class, 'create']);

            Route::get('/mobilites', [MobilitiesController::class, 'getAll']);
            Route::put('/mobilites', [MobilitiesController::class, 'update']);
            Route::post('/mobilites', [MobilitiesController::class, 'create']);

            Route::put('/update-status', [JobController::class, 'updateStatus']);
        
        });
    //});
});