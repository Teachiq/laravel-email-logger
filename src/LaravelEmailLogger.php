<?php

namespace Krisell\LaravelEmailLogger;

class LaravelEmailLogger
{
    public function handle($event)
    {
        EmailLog::create([
            'subject' => $event->message->getSubject(),
        ]);
    }
}
