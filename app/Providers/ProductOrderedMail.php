<?php

namespace App\Providers;

use App\Providers\ProductOrdered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductOrderedMail
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
     * @param  \App\Providers\ProductOrdered  $event
     * @return void
     */
    public function handle(ProductOrdered $event)
    {
        //
    }
}
