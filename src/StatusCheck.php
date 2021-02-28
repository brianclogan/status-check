<?php

namespace Darkgoldblade01\StatusCheck;

use Darkgoldblade01\StatusCheck\Models\LastLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;

class StatusCheck
{
    public static function registerEvents()
    {
        Event::listen(Login::class, function($event) {
            LastLogin::create([
                'user_id' => auth()->id()
            ]);
        });
    }
}
