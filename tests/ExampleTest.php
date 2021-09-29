<?php

namespace Krisell\LaravelEmailLogger\Tests;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Krisell\LaravelEmailLogger\EmailLog;
use Krisell\LaravelEmailLogger\LaravelEmailLoggerServiceProvider;
use Krisell\LaravelEmailLogger\Tests\TestMailable;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [LaravelEmailLoggerServiceProvider::class];
    }

    /** @test */
    public function a_test()
    {
        $this->assertCount(0, EmailLog::all());

        Mail::to('martin.krisell@example.com')->send(new TestMailable);

        $this->assertCount(1, EmailLog::all());
        $event = EmailLog::first();
        $this->assertNotNull($event->created_at);
        $this->assertEquals('Test mail subject', $event->subject);
    }
}
