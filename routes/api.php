<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculumController;

Route::get('/', [CurriculumController::class, 'testAPI']);