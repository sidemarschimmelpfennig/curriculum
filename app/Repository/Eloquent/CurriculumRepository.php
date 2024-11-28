<?php

namespace App\Repository\Eloquent;

use App\Models\Curriculum;
use App\Repository\Interfaces\CurriculumInterface;
use Illuminate\Database\Eloquent\Model;

class CurriculumRepository extends BaseRepository implements CurriculumInterface
{
	protected Model $model;
	
	public function __construct(){
		$this->model = new Curriculum;
	}
	
	public function testAPI(){
		return response()->json([
			'message' => 'API bonbando'
			
		], 200);
		
	}
	
	public function all(){
		return $this->model->all();
		
	}
	
	public function findByID(int $id){		
		return $this->model->find($id);
		
	}
	
	public function validateCurriculum(){
		
	}
	
}