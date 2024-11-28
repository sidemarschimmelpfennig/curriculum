<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancies extends Model
{
    protected $table = 'job_vacancies';
	
	protected $fillable = [
		'name',
		'departments_id',
		'departments',
		'status'
		
	];
}
