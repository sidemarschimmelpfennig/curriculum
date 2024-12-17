<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\{
    Interface\JobRepositoryInterface,
    Interface\CandidateRepositoryInterface,
    Interface\AdminRepositoryInterface, 

    Eloquent\JobRepository,
    Eloquent\CandidateRepository,
    Eloquent\AdminRepository

};
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
