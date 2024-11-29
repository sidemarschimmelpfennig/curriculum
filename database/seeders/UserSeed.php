<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    public function run(): void
    {
        $users = [
			[
				'login' => 'Kochem',
				'password' => Hash::make('k'),
				'is_admin' => 1
			],
			[
				'login' => 'Gustavo',
				'password' => Hash::make('g'),
				'is_admin' => 1
			],
			[
				'login' => 'Sidmar',
				'password' => Hash::make('s'),
				'is_admin' => 1
			],
			[
				'login' => 'Lodi',
				'password' => Hash::make('l'),
				'is_admin' => 1
			],
			
			[
				'login' => 'Teste',
				'password' => Hash::make('t'),
				'is_admin' => 0
			],
		];
		
		foreach($users as $user){
			User::create($user);
			
		}
    }
}
