@extends('layouts.app')

@section('title_of_tab')
    <p class="text-black font-bold text-2xl">Editar la categoria <span class="text-purple-500">{{ $category->title }}</span></h2></p>
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

        <div class="container items-center px-5 py-12 lg:px-20">
            <a href="{{ route('categories.index.admin') }}"
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
        
            <form method="POST" action="{{ route('categories.update.admin',$category) }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12">
                @method('PUT')
                @csrf
                <section class="flex flex-col w-full h-full p-1 overflow-auto">
                    <label for="name" class="text-base leading-7  mb-5">Imagen de la categoria</label>
                    <div class="input-images"></div>
                </section>
                <div class="relative p-4">
                    <label for="status" class="text-base leading-7 ">Estatus </label>
                    <br>
                    <select class="font-bold text-black w-1/2 px-4 py-2.5 mt-2 text-base  rounded-lg focus:border-blueGray-500 focus:outline-none ring-offset-2 " name="status">
                        <option class="font-bold w-1/2 px-4 py-2.5 mt-2 text-base  rounded-lg text-red-700 bg-red-100 focus:border-blueGray-500 focus:outline-none ring-offset-2 "       value="0" {{ $category->status == 0 ? 'selected' : '' }} >Inactivo</option>
                        <option class="font-bold w-1/2 px-4 py-2.5 mt-2 text-base  rounded-lg text-green-700 bg-green-100 focus:border-blueGray-500 focus:outline-none ring-offset-2 "   value="1" {{ $category->status == 1 ? 'selected' : '' }} >Activo</option>
                        <option class="font-bold w-1/2 px-4 py-2.5 mt-2 text-base  rounded-lg text-yellow-700 bg-yellow-100 focus:border-blueGray-500 focus:outline-none ring-offset-2 " value="2" {{ $category->status == 2 ? 'selected' : '' }} >Pendiente de aprobacion</option>
                    </select>
                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Titutlo de la categoria</label>
                    <input autocomplete="off" placeholder="Titulo" name="title" value="{{ old('title', $category->title) }}"
                        class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                </div>
                
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Descripcion de la categoria</label>
                    <br>
                    <textarea
                        class="resize-none font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2"
                        name="description" cols="30" rows="10" placeholder="Descripcion de la categoria">{{ old('description', $category->description) }} </textarea>
                </div>
                
                <div class="flex items-center w-full pt-4 mb-4">
                    <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Actualizar categoria </button>
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
