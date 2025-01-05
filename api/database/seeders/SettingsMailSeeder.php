<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsMailSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'smtp_username' => 'SGBR',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => '587',
            'email' => 'joaolodi01@gmail.com',
            'password' => 'teervrxwyllqoyyc',
            'smtp_encryption' => null

        ];

        Settings::create($settings);
    }
}
