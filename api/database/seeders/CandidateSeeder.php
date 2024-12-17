<?php

namespace Database\Seeders;

use App\Models\Candidates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        $candidate = [
            'full_name' => 'Gabriel Kochem',
            'email' => 'gabikochem55@gmail.com',
            'password' => Hash::make('g'),
            'phone' => '+55 49 999482859',
            'additional_info' => 'Dev PHP'
        ];
        
        Candidates::create($candidate);
    }
}
