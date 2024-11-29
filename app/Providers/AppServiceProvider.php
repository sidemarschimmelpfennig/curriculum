<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Eloquent\JobsRepository;
use App\Repository\Interfaces\JobsInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobsInterface::class, JobsRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
