<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    CandidateController,
    LoginController,
    JobController,

};

Route::prefix('register')->group(function () {
    Route::get('/login', function (){ return view('login'); });
    Route::get('/create-accont', function (){ return view('newAccont'); });
    
    Route::get('/login_method', [LoginController::class, 'getData']);
    Route::get('/logout_method', [LoginController::class, 'logout']);
    Route::post('/create', [CandidateController::class, 'create']);

});


    // Rotas candidatos
Route::prefix('v1')->group( function () {
    Route::get('/jobs', [JobController::class, 'getAll']);
    
    Route::prefix('/candidates')->group(function (){
        Route::post('/send', [CandidateController::class, 'send']);
        Route::post('/create', [CandidateController::class, 'create']);
        
        Route::get('/job/department/{department}', [JobController::class, 'findByDepartment']);
        Route::get('/job/category/{category}', [JobController::class, 'findByDepartmentCategories']);
        Route::get('/job/status/{status}', [JobController::class, 'findByStatus']);
        Route::post('/apply', [JobController::class, 'apply']);

    });
        

    Route::middleware('auth:sanctum')->group(function (){ 
        Route::prefix('/admin')->group(function (){    

            // + importante
            Route::get('/jobs', [JobController::class, 'getAll']);
            Route::post('/create-job', [JobController::class, 'create']);
            Route::put('/deleteDepartament/{id}', [JobController::class, 'deleteDepartament']);
            Route::put('/deleteUser/{id}', [UserController::class, 'delete']);
            Route::put('/deleteCandidate/{id}', [CandidateController::class, 'delete']);
                
            // +- importante
            Route::post('/create-departament', [JobController::class, 'createDepartament']);
            Route::post('/create-departament_category', [JobController::class, 'createDepartamentCategory']);
            Route::post('/create-status', [JobController::class, 'createStatus']);

            // - importante
            Route::post('/create-skills', [JobController::class, 'createSkills']);
            Route::post('/create-mobilities', [JobController::class, 'createMobilities']);
            
            Route::put('/update-status', [JobController::class, 'updateStatus']);
            Route::post('/send', [CandidateController::class, 'send']);
            Route::get('/newJobVacancy', [UserController::class, 'view']); // view
            Route::get('/send-file', function () {return view('file');});// view
        });
    });
}); 

    