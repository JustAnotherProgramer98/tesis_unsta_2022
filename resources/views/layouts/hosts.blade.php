<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'No leido del Env') }}</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">

 
</head>

<body class="antialiased">

    @yield('content')

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script type="text/javascript" src="{{ asset('js/image-uploader.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>