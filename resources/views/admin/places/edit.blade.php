@extends('layouts.app')

@section('content')

    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Sidebar -->
        <x-admin-side-bar></x-admin-side-bar>
        <!-- ./Sidebar -->

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

        <div class="px-12 h-full ml-14 mt-14 mb-10 md:ml-64 overflow-hidden">
            <div class="tabcontent container items-center px-5 py-12 lg:px-20">

                <h2 class="text-center">Editar el lugar <span class="text-blue-500">{{ $place->adress }}</span></h2>
                <a href="{{ route('places.index.admin') }}"
                class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
                Volver
                </a>
                @if ($errors->any())
                    <div class="text-center bg-blue-800 text-lg  text-white italic">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <form method="POST" action="{{ route('places.update.admin',$place) }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <section class="flex flex-col w-full h-full p-1 overflow-auto">
                        <label for="name" class="text-base leading-7  mb-5">Imagen del lugar</label>
                        <div class="input-images"></div>
                    </section>
                    <div class="relative p-4">
                        <label for="name" class="text-base leading-7 ">Pais</label>
                        <br>
                        <small class="text-gray-500">*Mas paises proximamente</small>
                        <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="country_id" >
                            <option value="1" selected>Argentina</option>
                        </select>
                    </div>
                    <div class="relative p-4">
                        <label for="name" class="text-base leading-7 ">Provincia</label>
                        <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="province_id" >
                            @forelse ($provinces as $province)
                            <option value="{{ $place->city->province->id }}" {{( $place->city->province->id == $province->id) ? 'selected' : '' }}> {{ $province->name }}</option>
                                
                        @empty
                        @endforelse
                        </select>
                    </div>
                    <div class="relative p-4">
                        <label for="name" class="text-base leading-7 ">Ciudad</label>
                        <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="city_id" >
                            <option value="1" selected>Argentina</option>
                        </select>
                    </div>
                    <div class="relative p-4">
                        <label for="name" class="text-base leading-7 ">Direccion</label>
                        <input name="adress" value="{{ old('adress', $place->adress) }}"
                            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    </div>
                    <div class="relative p-4">
                        <label for="name" class="text-base leading-7 ">Latitud y Longitud</label><br>
                        <small class="text-gray-500">**Separa con una , la latitud de la longitud</small>
                        <input  name="coordenates" value="{{ old('coordenates', $place->coordenates) }}"
                            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    </div>
                    <div class="flex items-center w-full pt-4 mb-4">
                        <button
                            class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Actualizar lugar </button>
                    </div>
                </form>
            </div>
            

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
            $('.input-images').imageUploader({
                label:'Arrastra o hace click para subir las imagenes'
            });
  
        });
        </script>
    @endsection
