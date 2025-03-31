<?php

namespace App\Providers;

use App\Interfaces\frontendRepositoryInterface;
use App\Repositories\frontendRepository;
use Illuminate\Support\ServiceProvider;

class FrontendProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(frontendRepositoryInterface::class, frontendRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
