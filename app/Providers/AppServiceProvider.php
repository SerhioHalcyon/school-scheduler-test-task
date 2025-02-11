<?php

namespace App\Providers;

use App\Repositories\{
    BellRepository,
    ScheduleRepository,
    SchoolClassRepository
};
use App\Services\Contracts\{
    BellRepositoryContract,
    ScheduleRepositoryContract,
    ScheduleServiceContract,
    SchoolClassRepositoryContract
};
use App\Services\{
    ScheduleService
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $services = [
        ScheduleServiceContract::class => ScheduleService::class,
    ];

    private array $repositories = [
        BellRepositoryContract::class => BellRepository::class,
        ScheduleRepositoryContract::class => ScheduleRepository::class,
        SchoolClassRepositoryContract::class => SchoolClassRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Services
        foreach ($this->services as $contract => $service) {
            $this->app->bind($contract, function (Application $app) use ($service) {
                return $app->make($service);
            });
        }

        // Repositories
        foreach ($this->repositories as $contract => $repository) {
            $this->app->bind($contract, function (Application $app) use ($repository) {
                return $app->make($repository);
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
}
