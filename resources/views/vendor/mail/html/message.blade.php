@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{-- <img style='display:flex;' src='https://drive.google.com/uc?id=1UlifAUz4G7fPdIRQXeBRpbPWVywSBEcA'  alt='logo' width='auto' height='80' /> --}}
            {{-- {{ config('app.name') }} --}}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            {{ 'Company Inc, 1100 Louisana St, Houston, TX 77002, USA' }} <br>
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') <br><br>
            {{ 'Supported & Powered by' }} . <a href="http://lifeyieldersfoundation.org" style="text-decoration: underline">Lifeyielders Foundation</a><br>
        @endcomponent
    @endslot
@endcomponent
