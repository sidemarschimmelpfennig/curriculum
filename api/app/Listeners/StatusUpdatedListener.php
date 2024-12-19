<?php

namespace App\Listeners;


use App\Models\Settings;
use App\Events\StatusUpdatedEvent;
use App\Services\JobService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;

class StatusUpdatedListener
{
    protected $jobService;
    
    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    /**
     * Handle the event.
     */
    public function handle(StatusUpdatedEvent $event)
    {
        $candidate = $event->candidate;
        $status = $event->status;

        $settings = Settings::first();

        $nameStatus = $this->jobService->findByStatus($status);


        Config::set('mail.mailers.smtp.host', $settings->smtp_host);
        Config::set('mail.mailers.smtp.port', $settings->smtp_port);
        Config::set('mail.mailers.smtp.username', $settings->email);
        Config::set('mail.mailers.smtp.password', $settings->password);
        Config::set('mail.mailers.smtp.encryption', $settings->smtp_encryption);
        Config::set('mail.from.address', $settings->email);
        Config::set('mail.from.name', 'Nome do Remetente');

        $subject = "Atualização do status do currículo.";
        $emailMessage = "Olá {$candidate->full_name}! Estamos entrando em contato através deste e-mail para informar o status do currículo enviado.";

        try {
            Mail::send('email', [
                'subject' => $subject,
                'emailMessage' => $emailMessage,
                'candidate' => $candidate,
                'status' => $nameStatus,
            ], function ($message) use ($candidate, $subject) {
                $message->to($candidate->email)
                        ->subject($subject);
            });
        } catch (\Exception $e) {
            Log::error('Erro ao enviar o e-mail: ' . $e->getMessage());
        }
    }
}
