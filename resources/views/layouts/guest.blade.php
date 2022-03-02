<!DOCTYPE html>

<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <title>{{ config('app.name', 'No leido del Env') }} |Animate a explorar el mundo! </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Explora el mundo -Unite a Turistear!"/>
    <meta name="keywords" content="Explora el mundo, Experiencias, Argentina, Viajes, Guia"/>
    <meta name="author" content="Evangelista Santiago - Laravel Web Developer">
    <meta name="copyright" content="Copyright 2022 - Evangelista Santiago Todos los derechos reservados">
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="{{ asset('images/Turistear3.png') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

</head>

    {{--Llamada del navbar  --}}
        @include('components.guests.navbar')
    {{--Fin del navbar  --}}



<body class="text-gray-800 antialiased">
    @yield("content")
    
    {{--Llamada del footer  --}}
        @include('components.guests.footer')
    {{--Fin del footer  --}}

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script type="text/javascript" src="{{ asset('js/image-uploader.js') }}"></script>
    
    

    <script>
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("block");
        }
        if (!window.ShadyDOM) window.ShadyDOM = {
            force: true,
            noPatch: true
        };
    </script>

</body>

</html>