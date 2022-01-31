@extends('layouts.app')

@section('title_of_tab')
    <p class="text-black font-bold text-2xl">Asignacion de categorias</p>
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
        
            <form method="POST"  class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
                @method('PUT')
                @csrf
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Experiencia</label>
                    <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="country_id" >
                        @forelse ($experiences as $experience)
                            <option value="{{ $experience->id }}"> {{ $experience->title }}</option>
                        @empty
                        <option value="X" selected>No hay experiencias en la base de datos</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Categoria</label>
                    <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="country_id" >
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->title }}</option>
                        @empty
                        <option value="X" selected>No hay categorias en la base de datos</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="relative p-4">
                    <label class="text-base leading-7 ">La experiencia quedara con las categorias:</label>
                    <br>
                    <label id="result_category" class="text-base leading-7 ">{{ $experiences->first()->categories->first()->title }}</label>
                </div>
                <div class="flex items-center w-full pt-4 mb-4">
                    <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Asignar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
