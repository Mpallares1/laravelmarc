<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\VideoCreated;
use App\Listeners\SendVideoCreatedNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Map the VideoCreated event to its listener
        VideoCreated::class => [
            SendVideoCreatedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Call the parent boot method to ensure proper functionality
        parent::boot();

        // Additional event registration logic can be added here if needed
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        // Enable automatic event discovery if required
        return false;
    }
}
