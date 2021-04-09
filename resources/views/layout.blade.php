<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>

@include('layouts.header')

@yield('content')

@include('layouts.footer')

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@stack('scripts')

@guest
    @include('forms.enter')
    @include('forms.registr')
@endguest

@auth
    @include('forms.answer')
@endauth

</body>
</html>


