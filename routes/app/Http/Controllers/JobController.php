<?php

namespace App\Http\Controllers;


use App\Repositories\Eloquent\JobRepository;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function __construct(
        private JobRepository $repository

    ) {}
    
}
