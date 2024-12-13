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
            'phone' => '+55 49 999482859',
            'additional_info' => 'Dev PHP',
            'skills' => 'Proativo'
        ];
        
        Candidates::create($candidate);
    }
}
