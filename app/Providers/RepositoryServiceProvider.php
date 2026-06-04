<?php

namespace App\Providers;

use App\Repositories\Eloquent\CollectionQueueRepository;
use App\Repositories\Eloquent\DriverRepository;
use App\Repositories\Eloquent\RedeemableRepository;
use App\Repositories\Eloquent\ReviewRepository;
use App\Repositories\Eloquent\ScheduleRepository;
use App\Repositories\Eloquent\SiteRepository;
use App\Repositories\Interfaces\CollectionQueueRepositoryInterface;
use App\Repositories\Interfaces\DriverRepositoryInterface;
use App\Repositories\Interfaces\RedeemableRepositoryInterface;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
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
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(CollectionQueueRepositoryInterface::class, CollectionQueueRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(RedeemableRepositoryInterface::class, RedeemableRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
