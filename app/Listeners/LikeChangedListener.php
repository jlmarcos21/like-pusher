<?php

namespace App\Listeners;

use App\Events\LikeChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LikeChangedListener implements ShouldQueue
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
     * @param  LikeChanged  $event
     * @return void
     */
    public function handle(LikeChanged $event)
    {
        //
    }
}
