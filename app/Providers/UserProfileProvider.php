<?php

namespace App\Providers;

use App\Interfaces\UserProfileRepositoryInterface;
use App\Repositories\UserProfileRepository;
use Illuminate\Support\ServiceProvider;

class UserProfileProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserProfileRepositoryInterface::class, UserProfileRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
