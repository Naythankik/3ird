<?php

namespace App\Providers;

use App\Mail\OrderProduct;
use App\Notifications\OrderMail;
use App\Providers\ProductOrdered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class   ProductOrderedMail
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
        Mail::to($event->user['email'])->send(new OrderProduct());
    }
}
