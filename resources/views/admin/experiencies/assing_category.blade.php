@extends('layouts.app')

@section('title_of_tab')
    <p class="text-paleta_tesis_celeste font-bold text-2xl">Asignacion de categorias</p>
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
            <a href="{{ route('categories.index.admin') }}" class="mb-4 bg-transparent hover:bg-paleta_tesis_celeste text-paleta_tesis_celeste font-semibold hover:text-white py-2 px-4 border border-paleta_tesis_celeste hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
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
        
            <form method="POST" action="{{ route('experiencies.assing.category.admin') }}"  class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white mt-8">
                @csrf
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Experiencia</label>
                    <select onchange="selectedExperience()" name="experience_id" id="experience_id" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        @forelse ($experiences as $experience)
                            <option value="{{ $experience->id }}"> {{ $experience->title }}</option>
                        @empty
                        <option value="X" selected>No hay experiencias en la base de datos</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Categoria</label>
                    <select onchange="selectedExperience()" name="category_id" id="category_id" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        @forelse ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->title }}</option>
                        @empty
                        <option value="X" selected>No hay categorias en la base de datos</option>
                        @endforelse
                    </select>
                    <p id="beneficiary" class="hidden relative p-4 w-full px-4 py-2.5 mt-2 border-transparent rounded-lg bg-red-500  font-extrabold focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 "><i class="fas fa-exclamation-triangle"></i> No puedes asignar 2 veces la misma categoria</p> 
                </div>
                
                <div class="relative p-4">
                    @isset($experiences->first()->categories)
                        <label id="no_categories" class="hidden text-sm font-semibold text-gray-500 ">La experiencia quedara con las categorias:</label>
                        <br>
                        <label id="result_category" class="hidden text-sm font-semibold text-gray-500 ">{{ $experiences->first()->categories->first()->title }}</label>
                    @endisset
                </div>
                <div class="flex items-center w-full pt-4 mb-4">
                    <button id="assign_category" class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Asignar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        //Based on selected options , show the resultant categories for an experiencie
        function selectedExperience() {
            
            let experience_id = $("#experience_id").val();
            let category_id = $("#category_id").val();
            let found =  @json($experiences).find(experience => experience.id == experience_id);
            let category_added =  @json($categories).find(category => category.id == category_id);
            
            if (found.categories != null) {
                let iterations = (found.categories).length;
                (found.categories).forEach(category => {
                    if (category.title != category_added.title ) {
                        $('#beneficiary').addClass( "hidden" )
                        $("#assign_category").prop("disabled", false);
                        if (!--iterations){
                            $('#no_categories').removeClass( "hidden" );
                            $('#result_category').removeClass( "hidden" );
                            $("#result_category").text(category_added.title+' - '+category.title);
                            $("#no_categories").text('La experiencia quedara con las categorias:');
                        }
                        else{
                        $('#result_category').removeClass( "hidden" );
                        $("#result_category").text(category_added.title+' - '+category.title+' - ');
                        $("#no_categories").text('La experiencia quedara con las categorias:');
                        }
                    }else{
                        $('#beneficiary').removeClass( "hidden" );
                        $('#result_category').addClass( "hidden" );
                        $('#no_categories').addClass( "hidden" );
                        $("#assign_category").prop("disabled", true);
                    }
                });
            }
            else{
                $('#result_category').addClass( "hidden" )
                $('#no_categories').removeClass( "hidden" );
                $("#no_categories").text('Asigna para darle la categoria '+category_added.title+' a esta experiencia');
            }
        };
        
    </script>
@endsection
