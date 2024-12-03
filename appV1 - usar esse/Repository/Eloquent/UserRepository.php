<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository// extends BaseRepository
{
	protected Model $model;
	
	public function __construct(){
		$this->model = new User;
	}
	
	public function all(){
		return $this->model->all();
		
	}

	public function findAdmin(){
		return $this->model->where('is_admin',1)->get();

	}
	
	public function findByID(int $id){		
		return $this->model->find($id);
		
	}
}