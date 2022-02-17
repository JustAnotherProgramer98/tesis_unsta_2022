@extends('layouts.app')

@section('title_of_tab')
<div class="flex align-middle">
    <p class="text-black font-bold text-2xl">Informacion sobre: <span class="text-paleta_tesis_celeste">{{ $category->title }}</span></p>
    <img width="100px" height="100px"  src="{{ asset('images/plane-with-marker.jpg') }}" alt="">
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
                <a href="{{ route('categories.index.admin') }}"
                    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i
                        class="fas fa-arrow-left"></i>
                    Volver
                </a>
                <section class="flex flex-col w-full h-full p-1 overflow-auto">
                    <label for="name" class="text-base leading-7  mb-5">Imagen de la categoria</label>
                    <header class="flex flex-row gap-6 items-center justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 {{ $category->images->first() ? '' :  'bg-gray-400 '}}">
                        {{ $category->images->first() ? '' :  'Sin imagen ! '}}
                        @if ($category->images->first())
                        @forelse ($category->images as $image)
                            <img width="300px" height="300px" class="rounded-3xl m-4" src="{{asset('storage/'.$image->url)}}" alt="{{ $image->alt }}">
                        @empty
                        <p>Sin Imagenes</p>
                        @endforelse
                    @endif
                    </header>
                </section>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Nombre de la categoria</label>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 "> <p>{{ $category->title }}</p></div>
                </div>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Descripcion de la categoria</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $category->description }}</p>
                    </div>
                </div>

            </div>

                <br>
                <br>
                <p>Datos de la categoria</p>
                <hr>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Estatus </label>
                    @switch($category->status)
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
                        <p>{{ $category->created_at }}</p>
                    </div>
                </div>

                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Cantidad de experiencias en la categoria</label>
                    <div
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <ul class="list-outside list-disc ">Experiencias: {{  count($category->experiences)  }}
                            @forelse ($category->experiences as $experience)
                            <li class="text-blue-800 ml-6">
                                <div class="text-black">{{ $experience->title }} | Anfitrion: {{ $experience->host->name }}</div></li>
                            @empty
                            <li>Sin informacion para mostrar</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>


        </div>

    @endsection
