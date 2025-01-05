<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\{
    Interface\JobInterface,
    Interface\CandidateInterface,
    Interface\UserInterface,
    Interface\DepartamentInterface,

    Eloquent\JobRepository,
    Eloquent\CandidateRepository,
    Eloquent\UserRepository,
    Eloquent\DepartamentRepository,

};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobInterface::class, JobRepository::class);
        $this->app->bind(CandidateInterface::class, CandidateRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(DepartamentInterface::class, DepartamentRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
