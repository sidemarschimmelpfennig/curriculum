<?php
// By Kochem
namespace Database\Seeders;

use App\Models\{
    Departament,
    Departament_Categories,
    Status,
    Skills,
    Mobilities
};

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobVacanciesSeed extends Seeder
{
    public function run(): void
    {
        $departaments = [
            [
                'departament' => 'Web'
            ],
            [
                'departament' => 'Desktop'
            ],
            [
                'departament' => 'Financeiro'
            ]
            
        ];
        foreach ($departaments as $departament) {
            Departament::create($departament);
        }

        $departament_categories = [
            [
                'departament_categorie' => 'Front End'
            ],  
            [
                'departament_categorie' => 'Back End'
            ],
            [
                'departament_categorie' => 'Auxiliar'
            ]
        ];
        foreach ($departament_categories as $departament_categorie) {
            Departament_Categories::create($departament_categorie);
        }
        $statuss = [
            [
                'status' => 'Aberta'
            ],
            [
                'status' => 'Analise'
            ],
            [
                'status' => 'Finalizado'
            ],
        ];

        foreach ($statuss as $status) {
            Status::create($status);
        }       
        $skills = [
            ['skills' => 'Comunicação'],
            ['skills' => 'Trabalho em equipe'],
            ['skills' => 'Resiliência'],
            ['skills' => 'Pensamento crítico']
        ];
        foreach ($skills as $skill) {
            Skills::create($skill);
        }

        $mobilities = [
            ['mobilities' => 'Home Office'],
            ['mobilities' => 'Presencial'],
            ['mobilities' => 'Híbrido']
        ];
        foreach ($mobilities as $mobility) {
            Mobilities::create($mobility);
        }
    }
}
