@component('mail::message')
# Introduction

The body of your message.
<h1>{{$content['order']  }}</h1>
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
