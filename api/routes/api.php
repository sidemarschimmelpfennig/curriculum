<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\{
    UserController,
    CandidateController,
    LoginController,
    JobController,
    DepartamentController,
    SettingsController
};
use App\Listeners\StatusUpdatedListener;

// Rotas de E-mail
Route::get('/settings', [SettingsController::class, 'showForm'])->name('email.form');
Route::put('/settings', [SettingsController::class, 'update'])->name('email.update');
Route::put('/status/{candidateId}', [CandidateController::class, 'updateStatus']);

// Rotas de Login
Route::get('/login', [LoginController::class, 'getData']);
Route::get('/account', function () { return view('newAccont'); });
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/create', [CandidateController::class, 'create']);

// Rotas de Candidatos
Route::prefix('v1')->group(function () {
    Route::get('/jobs', [JobController::class, 'getAll']);
    
    Route::prefix('/candidates')->group(function () {
        Route::post('/send', [CandidateController::class, 'send']);
        Route::post('/create', [CandidateController::class, 'create']);
        Route::get('/job/department/{department}', [JobController::class, 'findByDepartment']);
        Route::get('/job/category/{category}', [JobController::class, 'findByDepartmentCategories']);
        Route::get('/job/status/{status}', [JobController::class, 'findByStatus']);
        Route::post('/apply', [JobController::class, 'apply']);
    });
});

// Rotas Administrativas
Route::middleware('auth:sanctum')->prefix('v1/admin')->group(function () {
    Route::get('/jobs', [JobController::class, 'getAll']);
    Route::post('/create-job', [JobController::class, 'create']);
    Route::put('/deleteDepartament/{id}', [JobController::class, 'deleteDepartament']);
    Route::put('/deleteUser/{id}', [UserController::class, 'delete']);
    Route::put('/deleteCandidate/{id}', [CandidateController::class, 'delete']);
    Route::post('/create-departament', [DepartamentController::class, 'createDepartament']);
    Route::post('/create-departament_category', [JobController::class, 'createDepartamentCategory']);
    Route::post('/create-status', [JobController::class, 'createStatus']);
    Route::post('/create-skills', [JobController::class, 'createSkills']);
    Route::post('/create-mobilities', [JobController::class, 'createMobilities']);
    Route::put('/update-status', [JobController::class, 'updateStatus']);
    Route::get('/newJobVacancy', [UserController::class, 'view']);
    Route::get('/send-file', function () { return view('file'); });
}); 

    