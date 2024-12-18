<?php

namespace App\Providers;

use App\Events\StatusUpdatedEvent;
use App\Listeners\StatusUpdatedListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        StatusUpdatedEvent::class => [
            StatusUpdatedListener::class,
        ],
    ];

    public function register(): void
    {
        
    }

    public function boot(): void
    {
        
    }
}
