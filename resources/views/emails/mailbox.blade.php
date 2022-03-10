@component('mail::message')
# Introduction

Dear {{ $mailing->tomailer }}

{{ $mailing->message }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
