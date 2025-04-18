<?php

namespace App\Providers;

use App\Interfaces\AdminCategoryRepositoryInterface;
use App\Repositories\AdminCategoryRepository;
use Illuminate\Support\ServiceProvider;

class AdminCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminCategoryRepositoryInterface::class, AdminCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
