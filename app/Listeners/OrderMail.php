<?php

namespace App\Listeners;

use App\Events\OrderProduct;
use App\Models\Carts;
use App\Models\Images;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderMail implements ShouldQueue
{

    public $delay = 60;
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
     * @param  \App\Events\OrderProduct  $event
     * @return void
     */
    public function handle(OrderProduct $event)
    {

        Mail::to($event->user['email'])->later(now()->addMinute(3),new \App\Mail\OrderProduct());

    }
}
