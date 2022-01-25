<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'No leido del Env') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />

    
    </head>
    <body>
        @if (Auth::user())
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
            <div
            class="flex items-center justify-evenly md:justify-center w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
            <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
            src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                
            <span class="hidden md:block">{{ Auth::user()->name }}</span>
        </div>
        <div class="flex justify-between items-center h-14 bg-blue-800 dark:bg-gray-800 header-right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="p-4 items-center hover:text-blue-100 rounded-lg">Salir </button>
            </form>
        </div>
    </div>
    @endif
        
        @yield('content')


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>
    </body>
</html>
