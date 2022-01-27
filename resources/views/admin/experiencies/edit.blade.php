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
            <x-edit-experience-form :places="$places" :hosts="$hosts" :languajes="$languajes" :experience="$experience"></x-edit-experience-form>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.input-images').imageUploader({
                    label: 'Arrastra o hace click para subir las imagenes'
                });

            });
        </script>
    @endsection
