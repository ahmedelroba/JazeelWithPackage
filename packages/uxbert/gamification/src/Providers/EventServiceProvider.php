<?php

namespace Uxbert\Gamification\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Uxbert\Gamification\Events\ActionRegistered;
use Uxbert\Gamification\Listeners\UpdateActionPoints;
use Uxbert\Gamification\Listeners\UpdateLeaderboards;
use Illuminate\Support\Facades\Log;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        ActionRegistered::class => [
            UpdateActionPoints::class,
            UpdateLeaderboards::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Log::info('Showing EventServiceProvider ');

        // parent::boot();
    }
}