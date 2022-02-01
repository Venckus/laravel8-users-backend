<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\UserViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserViewedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserViewed  $event
     * @return void
     */
    public function handle(UserViewed $event)
    {
        $event->user->increment(User::VIEWS_COUNT_COL, 1);
        $event->user->views_count++;
    }
}
