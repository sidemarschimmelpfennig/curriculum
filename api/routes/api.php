<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\{
    UserController,
    CandidateController,
    LoginController,
    JobController,
    DepartamentController,
    EmailController
};

Route::get('/settings', [EmailController::class, 'showForm'])->name('email.form');
Route::put('/settings', [EmailController::class, 'update'])->name('email.update');

Route::get('/test-email', function () {

    Route::get('/email', [EmailController::class, 'edit']);
    Route::post('/email', [EmailController::class, 'update']);

    Mail::raw('Este é um e-mail de teste.', function ($message) {
        $message->to('joaolodi01@gmail.com')
                ->subject('Assunto do e-mail');
            

        
    });

    return 'E-mail enviado com sucesso!';
});

Route::get('/jobs', [JobController::class, 'getAll']);

Route::prefix('v1')->group( function () {
    Route::get('/jobs', [JobController::class, 'getAll']);    
    Route::post('/create', [CandidateController::class, 'create']);

    Route::post('/job-apply', [CandidateController::class, 'curriculumApply']);
    
    Route::get('/apply', [JobController::class, 'apply']);

    Route::get('/login', [LoginController::class, 'getData']);
    Route::get('/logout', [LoginController::class, 'logout']);
    

    Route::put('/candidate/{id}', [CandidateController::class, 'delete']);

    Route::middleware('auth:sanctum')->group(function (){ 
        Route::prefix('/admin')->group(function (){    
            Route::post('/jobs', [JobController::class, 'create']);
            Route::put('/departament/{id}', [JobController::class, 'deleteDepartament']);
            Route::post('/departament', [DepartamentController::class, 'createDepartament']);

            Route::put('/user/{id}', [UserController::class, 'delete']);
        
        });
    });
});