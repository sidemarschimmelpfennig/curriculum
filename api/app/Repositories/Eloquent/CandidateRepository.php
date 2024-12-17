<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateRepositoryInterface;

use App\Models\Candidates;
use Illuminate\Support\Facades\Hash;

class CandidateRepository implements CandidateRepositoryInterface
{
    public function create(array $data){
        return Candidates::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'additional_info' => $data['additional_info'],
            'file' => $data['file'],

        ]);
    }
}

