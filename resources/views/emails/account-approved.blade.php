@slot('header')
@component('mail::header', ['url' => 'https://www.420finder.net'])
{{ config('app.name') }}
@endcomponent
@endslot

@component('mail::message')
# Dear {{ $business->first_name }} {{ $business->last_name }}

Your account has been approved

Thanks,<br>
{{ config('app.name') }}
@endcomponent
