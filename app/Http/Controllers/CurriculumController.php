<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\CurriculumRepository;

class CurriculumController extends Controller
{
	public function __construct(
		private CurriculumRepository $repository
		
	){}
	
    public function testAPI(){
		  return $this->repository->testAPI();
		
    }

    public function all()
    {
		  return response()->json($this->repository->all());
        
    }
	
	  public function findByID(int $id)
    {
      return response()->json($this->repository->findByID($id));

    }

    public function validateCurriculum(array $data)
    {
      
    }
}