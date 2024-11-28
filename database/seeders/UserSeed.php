<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    public function run(): void
    {
        $users = [
			[
				'login' => 'Kochem',
				'is_admin' => 1
			],
			[
				'login' => 'Luiz',
				'is_admin' => 1
			],
			
			[
				'login' => 'Sidmar',
				'is_admin' => 1
			],
			[
				'login' => 'Lodi',
				'is_admin' => 1
			],
			
			[
				'login' => 'Teste',
				'is_admin' => 0
			],
		];
		
		foreach($users as $user){
			User::create($user);
			
		}
    }
}
