<!doctype html>
<html lang="en">

<head>
        <title>Chamayetu Reg Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/dashboard/assets/images/favicon.ico') }}">

    <!-- preloader css -->
{{--    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/preloader.min.css') }}" type="text/css" />--}}
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/libs/flatpickr/flatpickr.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/dashboard/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- choices js -->
    <script src="{{ asset('assets/dashboard/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>


    <!-- color picker css -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/libs/%40simonwep/pickr/themes/classic.min.css') }}"/> <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/libs/%40simonwep/pickr/themes/monolith.min.css') }}"/> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/libs/%40simonwep/pickr/themes/nano.min.css') }}"/> <!-- 'nano' theme -->

    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/libs/flatpickr/flatpickr.min.css') }}">
    @livewireStyles
    @stack('guest-styles')
</head>

<body>

{{$slot}}

<!-- JAVASCRIPT -->

<script src="{{ asset('assets/dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/libs/feather-icons/feather.min.js') }}"></script>
<!-- pace js -->
<script src="{{ asset('assets/dashboard/assets/libs/pace-js/pace.min.js') }}"></script>
<!-- password addon init -->
<script src="{{ asset('assets/dashboard/assets/js/pages/pass-addon.init.js') }}"></script>

<!-- choices js -->
<script src="{{ asset('assets/dashboard/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>



<!-- color picker js -->
<script src="{{ asset('assets/dashboard/assets/libs/%40simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>
<!-- color picker js -->

<!-- datepicker js -->
<script src="{{ asset('assets/dashboard/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('assets/dashboard/assets/js/pages/form-advanced.init.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

@livewireScripts
@stack('guest-scripts')
</body>

</html>
