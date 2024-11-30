<?php

namespace App\Repository\Eloquent;

use App\Models\Curriculum;
use App\Repository\Interfaces\CurriculumInterface;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class CurriculumRepository extends BaseRepository implements CurriculumInterface
{
	protected Model $model;
	
	public function __construct(){
		$this->model = new Curriculum;
	}
	
	public function all(){
		return $this->model->all();
		
	}
	
	public function findByID(int $id){		
		return $this->model->find($id);
		
	}
	
	public function validateCurriculum(array $data){
		$validator = Validator::make($data, [
			'file' => 'required|file'
		]);

		if($validator->fails()){
			return [
				'message' => 'Um erro ocorreu ao enviar o arquivo',
				'erro' => $validator->errors()->all()
				
			];
		}

		try {
			$curriculum = $this->model->create([
				'file' => $data['file']
			]);

			return [
				'success' => true,
				'message' => 'Curriculo enviado',
				'curriculum' => $curriculum

			];

		} catch (\Throwable $th) {
			return [
                'success' => false,
                'message' => 'Problemas para enviar os dados!',
                'th' => $th->getMessage(),
            ];
		}
	}
	
}