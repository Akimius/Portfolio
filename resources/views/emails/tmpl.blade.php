@component('mail::message')

<h2>Hello, {{$user}}! ({{$email}}) </h2>
<h4>Your phone number: {{$tel}} </h4>
<hr>
<p>Here is your message you sent us:</p>
<p>{{$msg}}</p>


@component('mail::button', ['url' => 'https://laracasts.com', 'color' => 'green'])
Browse to Laracast page
@endcomponent

@component('mail::panel', ['url' => ''])
    Some inspirational text here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent




