<?php

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
	protected Model $model;
	
	public function all(){
		return $this->model->all();
		
	}

	public function findAdmin(int $id){
		return $this->model->where('is_admin', 1)->get();
	}
	
	public function findByID(int $id){
		return $this->model->find($id);
		
	}	
}