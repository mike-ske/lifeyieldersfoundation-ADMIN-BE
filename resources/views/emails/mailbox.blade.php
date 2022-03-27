@component('mail::message')

<div style="width:100%;
        display:flex;">
    <a 
        href="http://lifeyieldersfoundation.org" 
        style="width:100%;
            display:flex;
            justify-content:end;
            margin-top:4px;
            margin-botom:4px !important;">
        <img style="margin-bottom:20px" src='https://drive.google.com/uc?id=1UlifAUz4G7fPdIRQXeBRpbPWVywSBEcA'  alt='logo' width='auto' height='80' />
    </a>

</div>

# {{ $mailing->subject }}

Hi,

{{ $mailing->message }}

{{-- @component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Check 
@endcomponent --}}
<hr><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
