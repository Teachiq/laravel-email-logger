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

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        parent::boot();
        // dd("HERE");
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // $this->app->singleton('laravel-email-logger', function () {
        //     return new LaravelEmailLogger;
        // });
    }
}
