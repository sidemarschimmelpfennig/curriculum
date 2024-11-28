<?php

namespace Database\Seeders;

use App\Models\JobVacancies;
use App\Models\DepartmentCategory;
use App\Models\Departments;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobVacanciesSeed extends Seeder
{
    public function run(): void
    {
		$department_categories = [
				'name' => 'Backend'
		];
        $department_categoriesID = DepartmentCategory::create($department_categories);

		$departments = [
			'name' => 'Desenvolvimento',
            'department_categories_id' => $department_categoriesID->id

        ];	
        
        $departmentsID = Departments::create($departments);
        

	    $job = [
			'name' => 'Desenvolvedor Backend',
			'department' => $departmentsID->id

		];
		
		JobVacancies::create([
            'name' => $job['name'],
            'departments_id' => 1,
            'status' => 'Enviado'

        ]);
    }
}
