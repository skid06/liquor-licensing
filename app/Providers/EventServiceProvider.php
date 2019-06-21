<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\NewApplication' => [
            'App\Listeners\SendAlertToAdmin',
        ],
        'App\Events\UserApplicationProcessed' => [
            'App\Listeners\SendProcessedAlertToUser'
        ],
        'App\Events\UserAndAdminPostComment' => [
            'App\Listeners\CommentNotificationsForUserAndAdmin'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
