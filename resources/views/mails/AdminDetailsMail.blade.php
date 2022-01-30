@component('mail::message')
Hello **{{ $name}}**,
Your chamayetu admin account is added and ready to be used.
login details are as follows,
email is **{{$email}}**
password **{{$password}}**
@endcomponent
