<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\CurriculumRepository;

use Illuminate\Http\Request;

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

    public function validaterepository(Request $request) 
    {
      $data = $request->all();
      $result = $this->repository->validateCurriculum($data);
      return response()->json([
        'data' => $data,
        'result' => $result
        
      ]);
      
    }
}