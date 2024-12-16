<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\{
    Interface\JobRepositoryInterface,
    Interface\CandidateRepositoryInterface,

    Eloquent\JobRepository,
    Eloquent\CandidateRepository

};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
