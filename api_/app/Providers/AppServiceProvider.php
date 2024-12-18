<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\{
    Interface\JobRepositoryInterface,
    Interface\CandidateRepositoryInterface,
    Interface\UserRepositoryInterface,
    Interface\DepartamentRepositoryInterface,

    Eloquent\JobRepository,
    Eloquent\CandidateRepository,
    Eloquent\UserRepository,
    Eloquent\DepartamentRepository

};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(DepartamentRepositoryInterface::class, DepartamentRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
