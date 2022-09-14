@component('mail::message')
# New contact received
@component('mail::button', ['url' => ''])
Check here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
