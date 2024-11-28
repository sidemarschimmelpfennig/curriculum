<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Eloquent\UserRepository;

class UserController extends Controller
{
	public function __construct(private UserRepository $repository){
		
	}

    public function index()
    {
        return response()->json($this->repository->all());
    }

    public function findAdmin()
    {
        return response()->json($this->repository->findAdmin());
    }
}
