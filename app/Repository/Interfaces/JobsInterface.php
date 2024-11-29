<?php

namespace App\Repository\Interfaces;

use stdClass;

interface JobsInterface extends BaseInterface
{	
	public function all();
	public function findByDepartment(string $department): stdClass|null;
	public function findByDepartmentCategories(string $category): stdClass|null;

	// For admins
	public function createJobVacancies(array $data);
}