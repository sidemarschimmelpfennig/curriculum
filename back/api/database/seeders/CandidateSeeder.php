<?php

namespace Database\Seeders;

use App\Models\Candidates;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        
        $candidate = [
            'full_name' => 'Lodi',
            'email' => 'roxosgbr@gmail.com',
            'phone' => '+55 49 999482859',
            'additional_info' => 'Dev PHP'
        ];
        
        Candidates::create($candidate);
    }
}
