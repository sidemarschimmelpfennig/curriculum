<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobVacancies;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function admin() {
        $jobs = JobVacancies::all();
        return view('adminPage', [
            'jobs' => $jobs
        ]);
    }
}
