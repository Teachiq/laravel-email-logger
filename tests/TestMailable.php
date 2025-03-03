<?php

namespace Krisell\LaravelEmailLogger\Tests;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMailable extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this
            ->html('<h2>Email content. Good stuff.</h2>')
            ->subject('Test mail subject');
    }
}
