<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\JobsRepository;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    
    public function __construct(private JobsRepository $repository)
    {
        
    }

    public function all()
    {
        return response()->json($this->repository->all());
        
    }

    // Teste - adicionar no interface
    public function findByDepartmente(string $department)
    {
        return response()->json($this->repository->findByDepartmente($department));
    }
}
