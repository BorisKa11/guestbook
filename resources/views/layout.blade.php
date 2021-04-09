<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.counters')
    @include('layouts.head')
</head>
<body>

@include('layouts.header')

<main>
    @yield('content')
</main>

@include('layouts.footer')

<script type="text/javascript" src="{{ asset('templates/trad/js/vendor/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@stack('scripts')

</body>
</html>


