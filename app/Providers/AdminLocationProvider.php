<?php

namespace App\Providers;

use App\Interfaces\AdminLocationRepositoryInterface;
use App\Repositories\AdminLocationRepository;
use Illuminate\Support\ServiceProvider;

class AdminLocationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminLocationRepositoryInterface::class, AdminLocationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
