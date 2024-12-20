<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    public function showForm()
    {
        $settings = Settings::first() ?: new Settings;
        return view('form', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'smtp_username' => 'required|string',
            'smtp_host' => 'required|string',
            'smtp_port' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'smtp_encryption' => 'nullable|string',
        ]);

        $settings = Settings::first() ?: new Settings;

        $settings->smtp_username = $request->smtp_username;
        $settings->smtp_host = $request->smtp_host;
        $settings->smtp_port = $request->smtp_port;
        $settings->email = $request->email;
        $settings->password = $request->password;
        $settings->smtp_encryption = $request->smtp_encryption ?? 'null';

        $settings->save();

        return response()->json([
            'message' => 'Configurações de e-mail atualizadas com sucesso!',
            'settings' => $settings,
        ]);
    }
}
