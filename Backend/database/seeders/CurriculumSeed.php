<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Curriculum;

class CurriculumSeed extends Seeder
{
    public function run(): void
    {
		$curriculuns = [
			[
			'title' => 'Curriculo Teste'
			
			],
			[
			'title' => 'Curriculo Teste 2'
			
			],
		];
		
		foreach($curriculuns as $curriculum){
			Curriculum::create($curriculum);
		
		}
    }
}
