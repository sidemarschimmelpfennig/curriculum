<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
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

Route::prefix('v1')->group( function () {

    Route::post('/login', [LoginController::class, 'getData']);
    Route::get('/logout', [LoginController::class, 'logout']);
    
    Route::get('/jobs', [JobController::class, 'getAll']);

    Route::get('/settings', [SettingsController::class, 'showForm'])->name('email.form');
    Route::put('/settings', [SettingsController::class, 'update'])->name('email.update');
    Route::put('/status/{candidateId}', [CandidateController::class, 'update']);

    Route::post('/candidate', [CandidateController::class, 'create']);
    Route::post('/apply', [CandidateController::class, 'apply']);
    
    Route::middleware('auth:sanctum')->group(function (){ 
        Route::prefix('/admin')->group(function (){    
                
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
        Route::post('/status', [StatusController::class, 'create']);

        Route::get('/users', [UserController::class, 'getAll']);
        Route::get('/userByID/{id}', [UserController::class, 'findByID']);
        Route::put('/user/{id}', [UserController::class, 'update']);
        Route::post('/user', [UserController::class, 'create']);

        Route::put('/update-status/job/{id}', [JobController::class, 'updateStatus']);
        Route::put('/update-status/candidate/{id}', [CandidateController::class, 'updateStatus']);
            
        Route::get('/candidates/job/{id}', [CandidateController::class, 'findByJob']);
        Route::get('/candidate/{id}', [CandidateController::class, 'findByID']);
        Route::get('/download/candidate/{id}', [CandidateController::class, 'downloadFile']);
        
           
        });
    });
});
        