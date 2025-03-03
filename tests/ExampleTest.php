<?php

namespace Krisell\LaravelEmailLogger\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
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

    #[Test]
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
