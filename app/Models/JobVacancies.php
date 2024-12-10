<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancies extends Model
{
    protected $table = 'job_vacancies';
	
	protected $fillable = [
		'name',
		'department_id',
		'department',

		'department_categories_id',
		'department_categories',

		'status_id',
		'status',
		
	];
	protected $hidden = [
		'department_id',
		'department_categories_id',
		'status_id',
		'updated_at',
		'created_at'
	];
}
