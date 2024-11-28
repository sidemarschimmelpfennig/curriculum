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
			[
				'name' => 'Backend'

			],
			[
				'name' => 'Frontend' 

			],
			[
				'name' => 'Desktop' 

			]

		];

		foreach ($department_categories as $catergorie) {
			DepartmentCategory::create($catergorie);
		}

		$departments = [
			[
				'name' => 'Desenvolvimento'

			],
			[
				'name' => 'Comercial' 

			],
			[
				'name' => 'Suporte' 

			]

		];

		foreach($departments as $department){
			Departments::create([
				'name' => $department['name'],
				'department_categories_id' => 1
			]);
			
		}
		
		$jobs = [
			[
				'name' => 'Desenvolvedor Backend',
				'department' => 'development',

			],
			
			[
				'name' => 'Desenvolvedor Frontend',
				'department' => 'development',
				
			]
		];
		
		foreach($jobs as $job){
			JobVacancies::create([
				'name' => $job['name'],
				'departments_id' => 1,
				'status' => 'Enviado'

			]);
		}
    }
}
