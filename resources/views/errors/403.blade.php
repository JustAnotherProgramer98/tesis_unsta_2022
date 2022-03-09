@extends('layouts.guest')

@section('content')
    <div class="bg-white">
        <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
            <div class="bg-gray-100 sm:rounded-lg pb-8">
                <div class="text-center p-8">
                    <h1 class="text-9xl font-bold text-paleta_tesis_azul">403</h1>
                    <h1 class="text-6xl font-medium py-8">Mmmmm... Accion no autorizada</h1>
                    <p class="text-lg pb-8 px-12 font-medium">No tienes las credenciales necesarias para acceder a esta pagina</p>
                    <a class="mr-8 w-full text-white bg-paleta_tesis_azul font-semibold px-6 py-3 rounded-md" href="{{ route('experiencies.index') }}">Ir al inicio</a>
                    <a class="w-full text-white bg-paleta_tesis_celeste font-semibold px-6 py-3 rounded-md" href="{{ route('contact_us') }}">Contactarnos</a>
                </div>
            </div>
        </div>
    </div>
@endsection
