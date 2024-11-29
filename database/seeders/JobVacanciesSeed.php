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
        $front = [
            'name' => 'Desenvolvimento Web',
            'department' => 'Frontend',
            'department_categories' => 'Desenvolvimento',
            'status' => 'Aberto',
        ];
		
		$back = [
            'name' => 'Desenvolvimento Backend',
            'department' => 'Banckend',
            'department_categories' => 'Desenvolvimento',
            'status' => 'Encerrada',

        ];

        $comercial = [
            'name' => 'Auxiliar adminstrativo',
            'department' => 'Financeiro',
            'department_categories' => 'Financeiro',
            'status' => 'Aberta',

        ];

        $this->createTest($comercial);
    }

    public function createTest($jobs) {
        return JobVacancies::create($jobs);

    }
}
