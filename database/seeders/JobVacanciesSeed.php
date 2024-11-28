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
			Departments::create($department);
			
		}

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
			JobVacancies::create($job);
		}
    }
}
