@component('mail::message')
# Introduction


Thank you for purchasing from our store.

Your product will be in shipping Mode soon.

Your order number {{$order_number}}

Please click the link below to track your order.

If you have any questions, or need some help, <a href="#" style="text-decoration: none">contact us</a>

@component('mail::button', ['url' => env('APP_URL').'/buy/orders/'.auth()->id(),'color'=> 'success'])
Track Order
@endcomponent

@component('mail::subcopy')
Happy Shopping!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

