@component('mail::message')

Dear {{$name}}

Welcome to 3ird - the Home of the Top Shopping Mall in Africa.

Whether you are actively looking for your products or just browsing, our dedicated team are here to help you make the right career decision.
Now that you have registered on our platform, a profile has been created on our platform.

If you have any queries or issues please contact our team.

<a href="{{ env('APP_URL')."/buy/complaints" }}" style="text-decoration: none">The 3ird Team</a>


@component('mail::subcopy')
    @component('mail::panel')
        <a href="tel:+234 817 7337 331">&phone; Call us</a><br>
        <a href="mailto:{{ env('MAIL_USERNAME') }}">&#9993; Send an Email</a>
        <h4>click the button below to login</h4>
        @component('mail::button',['url' => env('APP_URL')."/buy",'color' => 'success'])
            Here
        @endcomponent
    @endcomponent
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
