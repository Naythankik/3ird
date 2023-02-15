<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderProduct extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Order::where('user_id',auth()->id())
            ->orderBy('id','DESC')
            ->limit(1)
            ->get();
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->markdown('mail')->with([
                'order_number' => $user[0]['order_number'],
                'date' => $user[0]['created_at'],
            ]);
    }
}
