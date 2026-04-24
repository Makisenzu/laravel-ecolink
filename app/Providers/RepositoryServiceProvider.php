<?php

namespace App\Providers;

use App\Repositories\Eloquent\DriverRepository;
use App\Repositories\Eloquent\SiteRepository;
use App\Repositories\Interfaces\DriverRepositoryInterface;
use App\Repositories\Interfaces\SiteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SiteRepositoryInterface::class, SiteRepository::class);
        $this->app->bind(DriverRepositoryInterface::class, DriverRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
