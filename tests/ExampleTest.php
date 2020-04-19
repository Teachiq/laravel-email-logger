<?php

namespace Krisell\LaravelEmailLogger\Tests;

use Carbon\Carbon;
use Orchestra\Testbench\TestCase;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Krisell\LaravelEmailLogger\EmailLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Krisell\LaravelEmailLogger\Tests\TestMailable;
use Krisell\LaravelEmailLogger\LaravelEmailLoggerServiceProvider;

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

        Mail::to('martin.krisell@gmail.com')->send(new TestMailable);

        $this->assertCount(1, EmailLog::all());
        $event = EmailLog::first();
        $this->assertNotNull($event->created_at);
        $this->assertEquals('Test mail subject', $event->subject);
        $this->assertEquals('<h2>Email content. Good stuff.</h2>', $event->body);
    }
}
