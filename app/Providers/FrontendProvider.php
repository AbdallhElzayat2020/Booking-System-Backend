<?php

namespace App\Providers;

use App\Interfaces\FrontendRepositoryInterface;
use App\Repositories\FrontendRepository;
use Illuminate\Support\ServiceProvider;

class FrontendProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FrontendRepositoryInterface::class, FrontendRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
