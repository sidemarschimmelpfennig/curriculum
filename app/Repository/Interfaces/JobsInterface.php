<?php

namespace App\Repository\Interfaces;

use stdClass;

interface JobsInterface 
{	
	public function allJobs();
	public function findByDepartment(string $department): stdClass|null;
	public function findByDepartmentCategories(string $category): stdClass|null;

	// For admins
	public function createJobVacancies(array $validate);
}