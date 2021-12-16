
@component('mail::message')
    Hello **{{ $name}}**,  {{-- use double space for line break --}}
    Thank you for choosing Chamayetu!
    Your code is:
    {{$otp}}
@endcomponent
