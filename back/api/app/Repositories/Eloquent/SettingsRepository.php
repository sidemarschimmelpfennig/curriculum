<?php

namespace App\Repositories\Eloquent;

use App\Models\Settings;
use App\Repositories\Interface\SettingsInterface;

class SettingsRepository implements SettingsInterface
{
    public function update(array $data)
    {
        return Settings::create([
            'smtp_username' => $data['smtp_username'],
            'smtp_host' => $data['smtp_host'],
            'smtp_port' => $data['smtp_port'],
            'email' => $data['email'],
            'password' => $data['password'],
            'smtp_encryption' => $data['smtp_encryption'], 

        ]);
    }

}