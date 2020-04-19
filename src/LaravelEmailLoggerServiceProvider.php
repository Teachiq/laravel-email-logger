<?php

namespace Krisell\LaravelEmailLogger;

use Illuminate\Mail\Events\MessageSending;
use Krisell\LaravelEmailLogger\LaravelEmailLogger;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class LaravelEmailLoggerServiceProvider extends EventServiceProvider
{
    protected $listen = [
        MessageSending::class => [LaravelEmailLogger::class],
    ];

    public function boot()
    {
        parent::boot();
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
