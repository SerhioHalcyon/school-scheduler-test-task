<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
