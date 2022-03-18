@extends('layouts.app')

@section('title_of_tab')
<div class="flex flex-row">
    <img width="150px" height="150px"  src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo">
    <p class="text-black font-bold text-2xl my-auto">Informacion sobre: <span class="text-paleta_tesis_celeste">{{ $experience->title }}</span></p>
</div>


@endsection


@section('content')
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

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
                <a href="{{ route('experiencies.index.admin') }}" class="mb-4 bg-transparent hover:bg-paleta_tesis_celeste text-paleta_tesis_celeste font-semibold hover:text-white py-2 px-4 border border-paleta_tesis_celeste hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>Volver</a>
                <section class="flex flex-col w-full h-full p-1 overflow-auto">
                    <label for="name" class="text-base leading-7  mt-8 mb-5">Imagen de la experiencia</label>
                    <section class="h-80 flex flex-row items-center gap-6 justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border-2 border-gray-300 rounded-lg  ring-offset-current ring-offset-2">
                        @if ($experience->images->first())
                            @forelse ($experience->images as $image)
                                <img width="300px" height="300px" class="rounded-tl-lg rounded-br-lg m-4" src="{{asset($image->url)}}" alt="{{ $image->alt }}">
                            @empty
                            <p>Sin Imagenes</p>
                            @endforelse
                        @else
                        <i class="text-3xl fad fa-sad-tear"></i>
                        <label for="files">Esta experiencia no cuenta con fotos <br> </label>
                        @endif
                    </section>
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
                        <p><span class="text-paleta_tesis_celeste">Provincia: </span>   {{ $experience->place->city->province->name }}</p>
                        <p><span class="text-paleta_tesis_celeste">Ciudad: </span>   {{ $experience->place->city->name }}</p>
                        <p><span class="text-paleta_tesis_celeste">Direccion: </span>   {{ $experience->place->adress }}</p>
                        
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
                <hr style="width: 90%" class="border border-paleta_tesis_celeste">

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