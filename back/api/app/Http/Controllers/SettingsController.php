<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Services\SettingsService;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    protected $settingsService;
    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;

    }

    public function showForm()
    {
        $settings = Settings::first() ?: new Settings;
        return view('form', compact('settings'));
        
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'smtp_username' => 'required|string',
            'smtp_host' => 'required|string',
            'smtp_port' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'smtp_encryption' => 'nullable|string',
        ]);

        $settings = $this->settingsService->update($data);

        return response()->json([
            'message' => 'Configurações de e-mail atualizadas com sucesso!',
            'settings' => $settings,
        ]);
    }
}
