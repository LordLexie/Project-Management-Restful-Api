<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class LogAuthentication
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
        $info = $event->info;
        $record = $event->log;

        $record->ip_address = $info['ip_address'];
        $record->email = $info['email'];
        $record->token = $info['token'];
        $record->action = $info['action'];
        $record->status = $info['status'];
        $record->save();
    }
}
