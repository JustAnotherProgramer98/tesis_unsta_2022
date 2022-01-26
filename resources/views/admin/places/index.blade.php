@extends('layouts.app')

@section('content')

    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Sidebar -->
        <x-admin-side-bar></x-admin-side-bar>
        <!-- ./Sidebar -->

        <div class="px-10 h-full ml-14 mt-14 mb-10 md:ml-64 overflow-hidden">
            <!-- Client Table -->
            <div id="index" class="tabcontent mt-4 mx-4 block">
                <h1>Tabla de experiencias</h1>
                <hr class="border-1 border-slate-600">
                <br>
                <br>
                <button onclick="openNewTab(event, 'create')"
                    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear

                    un lugar
                </button>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Pais</th>
                                    <th class="px-4 py-3">Provincia</th>
                                    <th class="px-4 py-3">Ciudad</th>
                                    <th class="px-4 py-3">Direccion</th>
                                    <th class="px-4 py-3">Cantidad de experiencias en el lugar</th>
                                    <th class="px-4 py-3">Estado</th>
                                    <th class="px-4 py-3">Activar</th>
                                    <th class="px-4 py-3">Editar</th>
                                    <th class="px-4 py-3">Borrar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($places as $place)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 cursor-pointer">
                                            <p class="font-semibold uppercase">{{ $place->city->province->country->name }}</p>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer">
                                            <p class="font-semibold">{{ $place->city->province->name }}</p>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer">
                                            <p class="font-semibold">{{ Str::limit($place->city->name,10) }}</p>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer">
                                            <p class="font-semibold capitalize">{{ Str::limit($place->adress,25)}}</p>
                                        </td>
                                        <td class="text-center px-4 py-3 cursor-pointer">
                                            <p class="font-semibold capitalize">{{ $place->experiences_count}}</p>
                                        </td>
                                        <td class="px-4 py-3">
                                            @switch($place->status)
                                                @case(0)
                                                    <span
                                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Inactiva
                                                    </span>
                                                @break
                                                @case(1)
                                                    <span
                                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Activa
                                                    </span>
                                                @break
                                                @default
                                                    <span
                                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                                        Pendiente de aprobacion</span>
                                            @endswitch
                                        </td>
                                        @if ($place->status != 1)
                                            <td class="px-8 py-3 "><i  class="fas fa-check text-green-500"></i></td>
                                        @else
                                            <td class="px-8 py-3 "><i class="fas fa-check text-gray-500"></i></td>
                                        @endif
                                        <td class="px-8 py-3 "><a
                                                href="{{ route('experiencies.edit.admin', $place) }}"><i
                                                    class="fas fa-pencil-alt text-blue-500"></i></a>
                                        </td>
                                        <td class="px-8 py-3 "><i
                                                onclick="deletePlace(event,'{{ addslashes($place->title) }}',{{ $place->id }})"
                                                class="fas fa-trash-alt text-red-500 cursor-pointer	"></i></td>
                                    </tr>
                                    @empty
                                        <tr>No hay experiencias en la base de datos</tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <br>
                            {{ $places->links() }}
                        </div>
                    </div>
                </div>
                <x-create-place-form :provinces="$provinces"></x-create-place-form>
            </div>
        </div>


        <script>
            function deletePlace(e, place_name, place_id) {
                e.preventDefault();

                Swal.fire({
                    title: 'Borrar lugar',
                    text: '¿Estas seguro que quieres borrar el lugar?. Borraras tambien todas las experiencias asociadas a ese lugar',
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: "#1e40af",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Borrar",
                }).then(result => {
                        if (result.value) {
                            $.ajax({
                                url: "{{ route('places.destroy.admin') }}",
                                headers: {
                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                        "content"
                                    ),
                                },
                                type: 'DELETE',
                                data: {
                                    place_id: place_id
                                },

                                success: (result) => {
                                    // location.reload();
                                },
                                failure: (result) => alert(msg_error),
                            }); //fin Ajax
                            } // fin If
                        });
                };
        </script>
    @endsection
