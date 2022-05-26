<?php

namespace App\Providers;

use App\Events\OrderProduct;
use App\Events\PodcastProcessed;
use App\Events\UserDeleted;
use App\Listeners\OrderMail;
use App\Listeners\SendPodcastNotification;
use App\Listeners\SendShipmentNotification;
use App\Listeners\SendUserNotification;
use App\Models\Products;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            \App\Events\OrderShipped::class,
            [SendShipmentNotification::class,'handle']
        );
        Event::listen(
            OrderProduct::class,
            [OrderMail::class,'handle']
        );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
