<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\TestEvent;
use App\Listeners\TestEventListener;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

final class EventServiceProvider extends ServiceProvider
{
    /** @var array */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TestEvent::class => [
            TestEventListener::class
        ]
    ];

    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
