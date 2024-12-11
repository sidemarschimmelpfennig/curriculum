<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CurriculumController,
    JobController,
    LoginController,
    AdminController

};

use App\Http\Middleware\CheckUser;

Route::prefix('register')->group(function () {

    Route::get('/login', function (){ return view('login'); });
    Route::post('/login_method', [LoginController::class, 'login']);

});

// Rotas candidatos
Route::middleware('auth:sacntum')->group(function (){

    Route::prefix('v1/candidates')->group(function (){
        Route::get('/jobs', [JobController::class, 'getAll']);
        Route::get('/all/job/department/{department}', [JobController::class, 'findByDepartment']);
        Route::get('/all/job/category/{category}', [JobController::class, 'findByDepartmentCategories']);
        Route::get('/all/job/status/{status}', [JobController::class, 'findByStatus']);
        Route::post('/send', [CurriculumController::class, 'send']);
        Route::post('/create', [CurriculumController::class, 'create']);

    });
    
    // Rotas Administrativas
    Route::prefix('v1/admin')->group(function (){    
        Route::get('/jobs', [JobController::class, 'getAll']);
        Route::post('/add-job', [JobController::class, 'createJob']); // Funcionando
        Route::post('/add-departament', [JobController::class, 'createDepartament']); // Funcionando
        Route::post('/add-departament_category', [JobController::class, 'createDepartamentCategory']); // Funcionando
        Route::post('/add-status', [JobController::class, 'createStatus']); // Funcionando
        Route::get('/newJobVacancy', [AdminController::class, 'view']);
        Route::get('/send-file', function () {return view('file');});
        Route::post('/send', [CurriculumController::class, 'send']);

    });
});
    