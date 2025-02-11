<?php

namespace App\Providers;

use App\Repositories\BellRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\SchoolClassRepository;
use App\Services\Contracts\BellRepositoryContract;
use App\Services\Contracts\ScheduleRepositoryContract;
use App\Services\Contracts\ScheduleServiceContract;
use App\Services\Contracts\SchoolClassRepositoryContract;
use App\Services\ScheduleService;
use Illuminate\Database\Eloquent\Model;
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
        $this->app->bind(BellRepositoryContract::class, function (Application $app) {
            return $app->make(BellRepository::class);
        });
        $this->app->bind(ScheduleRepositoryContract::class, function (Application $app) {
            return $app->make(ScheduleRepository::class);
        });
        $this->app->bind(SchoolClassRepositoryContract::class, function (Application $app) {
            return $app->make(SchoolClassRepository::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
}
