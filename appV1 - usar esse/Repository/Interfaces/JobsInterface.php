<?php

namespace App\Repository\Interface;

interface JobsInterface //extends BaseInterface
{	
	public function findByDepartment(string $department);
	public function findByDepartmentCategories(string $category);
	public function findByStatus(string $status);

	// For admins
	public function createJobVacancies(array $validator);
}