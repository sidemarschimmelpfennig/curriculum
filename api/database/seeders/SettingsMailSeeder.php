<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;

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
