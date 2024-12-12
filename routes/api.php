<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AdminController,
    CandidateController,
    LoginController,
    JobController,

};

Route::get('/download', [CandidateController::class, 'downloadFile']); // download

Route::post('/create', [CandidateController::class, 'create']); // criar ""perfil""

Route::post('/send', [CandidateController::class, 'send']); // Envio de arquivo

Route::prefix('register')->group(function () {
    Route::get('/login', function (){ return view('login'); });
    Route::get('/login_method', [LoginController::class, 'login']);
    Route::get('/logout_method', [LoginController::class, 'logout']);

});

// Rotas candidatos
Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('v1/candidates')->group(function (){
        Route::get('/jobs', [JobController::class, 'getAll']);
        Route::get('/job/department/{department}', [JobController::class, 'findByDepartment']);
        Route::get('/job/category/{category}', [JobController::class, 'findByDepartmentCategories']);
        Route::get('/job/status/{status}', [JobController::class, 'findByStatus']);
        
        Route::post('/send', [CandidateController::class, 'send']);
        Route::post('/create', [CandidateController::class, 'create']);

        Route::post('/apply', [JobController::class, 'apply']);

    });
    
    // Rotas Administrativas
    Route::prefix('v1/admin')->group(function (){    
        Route::get('/jobs', [JobController::class, 'getAll']);
        Route::post('/add-job', [JobController::class, 'createJob']);
        Route::post('/add-departament', [JobController::class, 'createDepartament']);
        Route::post('/add-departament_category', [JobController::class, 'createDepartamentCategory']);
        Route::post('/add-status', [JobController::class, 'createStatus']);
        Route::get('/newJobVacancy', [AdminController::class, 'view']); // view
        Route::get('/send-file', function () {return view('file');});// view
        Route::post('/send', [CandidateController::class, 'send']);

    });
});
    