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
		  return $this->curriculum->testAPI();
		
    }

    public function all()
    {
		  return response()->json($this->curriculum->all());
        
    }
	
	  public function findByID(int $id)
    {
      return response()->json($this->curriculum->findByID($id));

    }

    public function validateCurriculum(Request $request) 
    {
      $data = $request->all();
      $result = $this->repository->validateCurriculum($data);
      return response()->json([
        'data' => $data,
        'result' => $result
        
      ]);
      
    }
}