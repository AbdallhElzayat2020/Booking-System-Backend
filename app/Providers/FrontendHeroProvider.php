<?php

namespace App\Providers;

use App\Interfaces\FrontendHeroRepositoryInterface;
use App\Repositories\FrontendHeroRepository;
use Illuminate\Support\ServiceProvider;

class FrontendHeroProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FrontendHeroRepositoryInterface::class, FrontendHeroRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
