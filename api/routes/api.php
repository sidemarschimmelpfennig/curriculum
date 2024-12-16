<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AdminController,
    CandidateController,
    LoginController,
    JobController,

};

Route::post('/create-job', [JobController::class, 'create']);
Route::prefix('register')->group(function () {
    Route::get('/login', function (){ return view('login'); });
    Route::get('/create-accont', function (){ return view('newAccont'); });
    
    Route::get('/login_method', [LoginController::class, 'getData']);
    Route::get('/logout_method', [LoginController::class, 'logout']);
    Route::post('/create', [CandidateController::class, 'create']);

});

Route::middleware('auth:sanctum')->group(function (){
    // Rotas candidatos
    Route::prefix('v1/candidates')->group(function (){
        Route::post('/send', [CandidateController::class, 'send']);
        Route::post('/create', [CandidateController::class, 'create']);
        
        Route::get('/jobs', [JobController::class, 'getAll']);
        Route::get('/job/department/{department}', [JobController::class, 'findByDepartment']);
        Route::get('/job/category/{category}', [JobController::class, 'findByDepartmentCategories']);
        Route::get('/job/status/{status}', [JobController::class, 'findByStatus']);
        Route::post('/apply', [JobController::class, 'apply']);

    });
    
    // Rotas Administrativas
    Route::prefix('v1/admin')->group(function (){    
        // + importante
        Route::get('/jobs', [JobController::class, 'getAll']);
        
        // +- importante
        Route::post('/create-departament', [JobController::class, 'createDepartament']);
        Route::post('/create-departament_category', [JobController::class, 'createDepartamentCategory']);
        Route::post('/create-status', [JobController::class, 'createStatus']);

        // - importante
        Route::post('/create-skills', [JobController::class, 'createSkills']);
        Route::post('/create-mobilities', [JobController::class, 'createMobilities']);
        
        Route::put('/update', [JobController::class, 'update']);
        Route::post('/send', [CandidateController::class, 'send']);
        Route::get('/newJobVacancy', [AdminController::class, 'view']); // view
        Route::get('/send-file', function () {return view('file');});// view

    });
});