<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ApplyController,
    UserController,
    LoginController,
    
    CandidateController,
    DepartamentCategoryController,

    JobController,
    DepartamentController,
    MobilitiesController,
    SettingsController,
    SkillsController,
    StatusController
};
use Illuminate\Support\Facades\Log;

// Rotas de E-mail
Route::get('/settings', [SettingsController::class, 'showForm'])->name('email.form');
Route::put('/settings', [SettingsController::class, 'update'])->name('email.update');
Route::put('/status/{candidateId}', [CandidateController::class, 'updateStatus']);

Route::prefix('v1')->group( function () {
    Route::get('/jobs', [JobController::class, 'getAll']);
    Route::post('/candidate', [CandidateController::class, 'create']);

    Route::post('/apply', [ApplyController::class, 'apply']);
    Log::info('Memória usada ' . memory_get_usage(true));

    Route::post('/login', [LoginController::class, 'getData']);
    Route::get('/logout', [LoginController::class, 'logout']);
    
    Route::put('/candidate/{id}', [CandidateController::class, 'delete']);

    //Route::middleware('auth:sanctum')->group(function (){ 
        Route::prefix('/admin')->group(function (){    
            // + importante
            Route::get('/jobs', [JobController::class, 'getAll']);
            Route::get('/jobBy/{id}', [JobController::class, 'findID']);
            Route::post('/job', [JobController::class, 'create']);
            Route::put('/job/{id}', [JobController::class, 'update']);

            Route::delete('/departament/{id}', [DepartamentController::class, 'delete']);
            Route::delete('/user/{id}', [UserController::class, 'delete']);
            Route::delete('/candidate/{id}', [CandidateController::class, 'delete']);
            Route::delete('/job/{id}', [JobController::class, 'delete']);
        
            Route::get('/departament', [DepartamentController::class, 'getAll']);
            Route::put('/departament', [DepartamentController::class, 'update']);
            Route::post('/departament', [DepartamentController::class, 'create']);

            Route::get('/categorys', [DepartamentCategoryController::class, 'getAll']);
            Route::put('/category', [DepartamentCategoryController::class, 'update']);
            Route::post('/category', [DepartamentCategoryController::class, 'create']);

            Route::get('/skills', [SkillsController::class, 'getAll']);
            Route::put('/skills', [SkillsController::class, 'update']);
            Route::post('/skill', [SkillsController::class, 'create']);

            Route::get('/mobilites', [MobilitiesController::class, 'getAll']);
            Route::put('/mobilites', [MobilitiesController::class, 'update']);
            Route::post('/mobilites', [MobilitiesController::class, 'create']);

            Route::get('/status', [StatusController::class, 'getAll']);
            Route::put('/status', [StatusController::class, 'update']);
            Route::post('/statusC', [StatusController::class, 'create']);

            Route::put('/update-status', [JobController::class, 'updateStatus']);
        
            Route::get('/candidates/job/{id}', [CandidateController::class, 'findByJob']);
        });
    //});
});