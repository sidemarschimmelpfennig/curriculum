<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\{
    Interface\JobRepositoryInterface,
    Interface\AdminRepositoryInterface,

    Eloquent\JobRepository,
    Eloquent\AdminRepository

};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    }


    
    public function boot(): void
    {
        //
    }
}
