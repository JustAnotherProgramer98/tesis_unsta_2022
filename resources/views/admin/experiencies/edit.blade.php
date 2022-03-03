@extends('layouts.app')

@section('title_of_tab')
    <p class="font-bold text-2xl text-black">Editar experiencia <span class="text-paleta_tesis_celeste font-normal">{{ $experience->title }}</span></p>
@endsection

@section('content')
    <div class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

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
            <x-edit-experience-form :places="$places" :hosts="$hosts" :languajes="$languajes" :experience="$experience"></x-edit-experience-form>

        </div>

        @php
        $count=count($experience->images);
        $varJS = array();
        foreach ($experience->images as $image)  array_push($varJS,asset("storage/".$image->url));
        @endphp


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>

        let count={!! json_encode($count) !!};
        var preloaded = [];
        var values = {!! json_encode($varJS) !!}
        if(values != []){
            for(var i = 0; i < count; i++){
            preloaded.push({id: i, src: values[i]});
            }
        }

        $(document).ready(function() {
            change_select_color();
            $('.input-images').imageUploader({
                label: 'Arrastra o hace click para subir las imagenes',
                preloaded: preloaded
            });
        });
        </script>
    @endsection