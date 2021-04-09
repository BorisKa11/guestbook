<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name') }}{{ isset($subtitle) ? '. ' . $subtitle : '' }}</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}?v=1.5">

@stack('styles')
