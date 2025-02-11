<?php

namespace App\Providers;

use App\Repositories\ScheduleRepository;
use App\Services\Contracts\ScheduleRepositoryContract;
use App\Services\Contracts\ScheduleServiceContract;
use App\Services\ScheduleService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Services
        $this->app->bind(ScheduleServiceContract::class, function (Application $app) {
            return $app->make(ScheduleService::class);
        });

        // Repositories
        $this->app->bind(ScheduleRepositoryContract::class, function (Application $app) {
            return $app->make(ScheduleRepository::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
