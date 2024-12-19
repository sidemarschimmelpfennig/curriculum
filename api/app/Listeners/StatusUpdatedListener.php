<?php

namespace App\Listeners;

use App\Models\Settings;
use App\Events\StatusUpdatedEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;

class StatusUpdatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Log::info("Evento StatusUpdatedEvent disparado.");

        $candidate = $event->candidate;
        $status = $event->status;

        $settings = Settings::first();

        if (!$settings){
            Log::error('Configurações de e-mail não encontradas.');
            return;
        }

        Log::info('Host SMTP: ' . $settings->smtp_host);

        Config::set('mail.mailers.smtp.host', $settings->smtp_host);
        Config::set('mail.mailers.smtp.port', $settings->smtp_port);
        Config::set('mail.mailers.smtp.username', $settings->email);
        Config::set('mail.mailers.smtp.password', $settings->password);
        Config::set('mail.mailers.smtp.encryption', $settings->smtp_encryption);
        Config::set('mail.from.address', $settings->email);
        Config::set('mail.from.name', 'Nome do Remetente');

        $subject = "Atualização do status do currículo.";
        $emailMessage = "Olá {$candidate->full_name}! Estamos entrando em contato através deste e-mail para informar o status do currículo enviado.";

        Log::info('Enviando e-mail para: ' . $candidate->email);
        Log::info('Assunto do e-mail: ' . $subject);
        Log::info('Corpo do e-mail: ' . $emailMessage);

        try {
            Mail::send('email', [
                'subject' => $subject,
                'emailMessage' => $emailMessage,
                'status' => $status,
            ], function ($message) use ($candidate, $subject) {
                $message->to($candidate->email)
                        ->subject($subject);
            });

            Log::info("E-mail enviado com sucesso para {$candidate->email}");

        } catch (\Exception $e) {
            Log::error('Erro ao enviar o e-mail: ' . $e->getMessage());
        }
    }
}
