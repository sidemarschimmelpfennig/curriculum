<?php
// By Kochem
namespace Database\Seeders;

use App\Models\{
    Departament,
    Departament_Categories,
    Status,
    Mobilities

};

use Illuminate\Database\Seeder;

class JobVacanciesSeed extends Seeder
{
    public function run(): void
    {
        $departaments = [
            [
                'departament' => 'Desenvolvimento'
            ],
            [
                'departament' => 'Qualidade'
            ],
            [
                'departament' => 'Marketing'   
            ],
            [
                'departament' => 'Suporte'
            ],
            [
                'departament' => 'Vendas'
            ],
            [
                'departament' => 'Financeiro'
            ],
            [
                'departament' => 'RH'
            ],
            
        ];
        foreach ($departaments as $departament) {
            Departament::create($departament);
        }

        $departament_categories = [
            [
                'departament_category' => 'Web - FrontEnd'
            ],  
            [
                'departament_category' => 'Web - BackEnd'
            ],
            [
                'departament_category' => 'Qualidade - Web'
            ],
            [
                'departament_category' => 'Desktop'
            ],
            [
                'departament_category' => 'Qualidade - Desktop'
            ],
            [
                'departament_category' => 'Mobile'
            ],
            [
                'departament_category' => 'Qualidade - Mobile'
            ],
            [
                'departament_category' => 'Design Gráfico'
            ],
            [
                'departament_category' => 'Edito de vídeos'
            ],
            [
                'departament_category' => 'Ui/Ux design'
            ],
            [
                'departament_category' => 'Auxiliar de Suporte técnico'
            ],
            [
                'departament_category' => 'Consultoria'
            ],
            [
                'departament_category' => 'Auxiliar Financeiro'
            ],
            [
                'departament_category' => 'Analista de RH'
            ],
            [
                'departament_category' => 'Auxiliar de RH'
            ]
        ];
        foreach ($departament_categories as $departament_categorie) {
            Departament_Categories::create($departament_categorie);
        }
        $statuss = [
            [
                'status' => 'Pendente'
            ],
            [
                'status' => 'Entrevista marcada'
            ],

            [
                'status' => 'Analise'
            ],
            [
                'status' => 'Aprovado'
            ],

            [
                'status' => 'Reprovado'
            ],
        ];

        foreach ($statuss as $status) {
            Status::create($status);
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
