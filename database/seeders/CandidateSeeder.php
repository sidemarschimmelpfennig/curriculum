<?php

namespace Database\Seeders;

use App\Models\Candidates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        $candidate = [
            'full_name' => 'Gabriel Kochem',
            'email' => 'gabikochem55@gmail.com',
            'contactphone' => '+55 49 999482859',
            'additional_info' => 'Dev PHP',
            'ability' => 'Proativo'
        ];
        
        Candidates::create($candidate);
    }
}
