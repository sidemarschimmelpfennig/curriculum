<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\JobRepository;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function __construct(
        private JobRepository $repository
        
    ) {}

    public function getAll(){
        return response()->json($this->repository->getAll());

    }

    public function findByID(int $id) {
        return response()->json($this->repository->findByID($id));

    }

    findByDepartment
}
