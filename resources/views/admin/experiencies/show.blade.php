@extends('layouts.app')

@section('title_of_tab')
<div class="flex align-middle">
    <p class="text-black font-bold text-2xl">Informacion sobre <span class="text-purple-500">{{ $experience->title }}</span></h2></p>
    <img src="{{ asset('images/mountains.png') }}" alt="">
</div>
@endsection


@section('content')
    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        @if (session()->has('success'))
            <div class="alert alert-success">
                @if (is_array(session('success')))
                    <ul>
                        @foreach (session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success') }}
                @endif
            </div>
        @endif

        <div class="h-full">
            <div class="tabcontent container items-center px-5 py-12 lg:px-20">
                <a href="{{ route('experiencies.index.admin') }}"
                    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i
                        class="fas fa-arrow-left"></i>
                    Volver
                </a>
                <section class="flex flex-col w-full h-full p-1 overflow-auto">
                    <label for="name" class="text-base leading-7  mb-5">Imagen de la experiencia</label>
                    <header class="flex flex-col items-center justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        <img src="{{asset('storage/'.$experience->images->first()->url)}}" alt="{{ $experience->images->first()->alt }}">
                    </header>
                </section>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Titulo de la Experiencia</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $experience->title }}</p>
                    </div>
                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Subtitulo de la Experiencia</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $experience->title }}</p>
                    </div>
                </div>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Precio de la  Experiencia</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $experience->price }}</p>
                    </div>
                </div>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Cantidad de clientes que pueden tomar la experiencia</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $experience->quantity_clients }}</p>
                    </div>
                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Descripcion de la experiencia</label>
                    <br>
                    <div style="height: 10rem !important"
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2">
                        <p class="">{{ $experience->description }}</p>
                    </div>
                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Ubicacion de la experiencia</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p><span class="text-blue-800">Provincia: </span>   {{ $experience->place->city->province->name }}</p>
                        <p><span class="text-blue-800">Ciudad: </span>   {{ $experience->place->city->name }}</p>
                        <p><span class="text-blue-800">Direccion: </span>   {{ $experience->place->adress }}</p>
                        
                    </div>

                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Anfitrion de la experiencia</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $experience->host->name }}</p>
                    </div>
                </div>

                <br>
                <br>
                <p>Datos de la Experiencia</p>
                <hr>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Estatus </label>
                    @switch($experience->status)
                        @case(0)
                            <div
                                class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-red-700 bg-red-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                                <p>Inactivo</p>
                            </div>
                        @break
                        @case(1)
                            <div
                                class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-green-700 bg-green-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                                <p>Activo</p>
                            </div>
                        @break
                        @default
                            <div
                                class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-yellow-700 bg-yellow-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                                <p>Pendiente de aprobacion</p>
                            </div>
                    @endswitch
                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Fecha de creacion</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $experience->created_at }}</p>
                    </div>
                </div>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Cantidad de usuarios que la compraron</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ count($experience->sales) }}</p>
                    </div>
                </div>
            </div>


        </div>

    @endsection