@component('mail::message')
# پاسخ به پیام: {{ $message['email'] }}
<h3>موضوع پیام: {{ $message['subject'] }}</h3>

{{ $message['message'] }}

@component('mail::button', ['url' => \Illuminate\Support\Facades\URL::to('/')])
بازگشت به وبسایت
@endcomponent

با تشکر<br>
{{ config('app.name') }}
@endcomponent
