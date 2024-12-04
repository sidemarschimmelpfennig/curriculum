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
        $jobs = [
            [
                'name' => 'Desenvolvimento Web',
                'department' => 'Frontend',
                'department_categories' => 'Desenvolvimento',
                'status' => 'Aberto',
            ],
            
            [
                'name' => 'Desenvolvimento Backend',
                'department' => 'Banckend',
                'department_categories' => 'Desenvolvimento',
                'status' => 'Encerrada',

            ],

            [
                'name' => 'Auxiliar adminstrativo',
                'department' => 'Financeiro',
                'department_categories' => 'Financeiro',
                'status' => 'Aberta',

            ]
        ];
            
        foreach ($jobs as $job) {
            //echo '<pre>'; print_r($job); echo '</pre>';
            JobVacancies::create($job);
        }
        
    }
}
