<?php

namespace App\Providers;

use App\Interfaces\AdminProfileRepositoryInterface;
use App\Repositories\AdminProfileRepository;
use Illuminate\Support\ServiceProvider;

class AdminProfileProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminProfileRepositoryInterface::class, AdminProfileRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
