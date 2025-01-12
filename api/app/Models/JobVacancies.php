<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancies extends Model
{
    protected $table = 'job_vacancies';
	
	protected $fillable = [
		'name',
		'description',
		//fk
		'departament_id',
		'departament',

		'departament_categories_id',
		'departament_categories',

		'status_id',
		'status',
		
		'skills',

		'mobilities_id',
		'mobilities',
        'active'
		
	];
	protected $hidden = [
		'updated_at',
		'created_at'
	];
}
