<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'kochem',
            'email' => 'kochem@direcao.com',
            'password' => Hash::make('08805166901'),
            'is_admin' => 1

        ];

        User::create($user);
    }
}
