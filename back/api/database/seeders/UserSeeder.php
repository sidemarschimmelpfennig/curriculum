<?php

namespace Database\Seeders;

use Illuminate\{
    Support\Facades\Hash,
    Database\Seeder

};

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = [
            'full_name' => 'Admin',
            'email' => 'admin@direcao.com',
            'password' => Hash::make('1'),
            'is_admin' => 1

        ];

        User::create($user);

    }
}
