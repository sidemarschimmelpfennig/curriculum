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
		'department_id',
		'department',

		'department_categories_id',
		'department_categories',

		'status_id',
		'status',

		'skills_id',
		'skills',

		'mobilities_id',
		'mobilities'
		
	];
	protected $hidden = [
		'department_id',
		'department_categories_id',
		'status_id',
		'skills_id',
		'status_id',
		'updated_at',
		'created_at'
	];
}
