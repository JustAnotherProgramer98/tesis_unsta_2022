@extends('layouts.app')

@section('title_of_tab')
    <p class="text-purple-500 font-bold  text-2xl">Experiencias</p>
@endsection
@section('content')
    <div class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        <div class="h-full overflow-hidden">
            <!-- Client Table -->
            <div id="index" class="tabcontent mt-4 mx-4 block">

                <div class="flex gap-4 mb-4">
                    <div class="relative w-1/2">
                        <input type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar experiencia..." />
                        <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button style="margin-top: auto;margin-bottom: auto" onclick="openNewTab(event, 'create')"
                    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear

                    experiencia
                        <button style="margin-top: auto;margin-bottom: auto" id="button-popover" class="rounded-full border-2 border-blue-500 shadow-lg h-8 w-8" aria-describedby="tooltip">?</button>
                        <div id="tooltip" role="tooltip"> Hace click en las primeras 3 columnas y mira el detalle de la experiencia
                            <div id="arrow" data-popper-arrow></div>
                        </div>
                </div>
                
                </button>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Titulo</th>
                                    <th class="px-4 py-3">Anfitrion</th>
                                    <th class="px-4 py-3">Lugar</th>
                                    <th class="px-4 py-3">Precio</th>
                                    <th class="px-4 py-3">Estado de la experiencia</th>
                                    <th class="px-4 py-3">Activar</th>
                                    <th class="px-4 py-3">Editar</th>
                                    <th class="px-4 py-3">Borrar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($experiences as $experience)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $experience) }}">
                                                <p class="font-semibold capitalize">{{ $experience->title }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $experience) }}">
                                                <p class="font-semibold capitalize">{{ $experience->host->name }} | {{ $experience->host->surname }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $experience) }}">
                                                <p class="font-semibold capitalize">{{ Str::limit($experience->place->city->province->name.' - '.$experience->place->city->name,20) }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                                <p class="font-semibold capitalize">$ {{ $experience->price }}  </p>
                                        </td>
                                        <td class="px-4 py-3">
                                            @switch($experience->status)
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
                                        @if ($experience->status != 1)
                                            <td class="px-8 py-3 "><i
                                                    onclick="approveExperience(event,'{{ addslashes($experience->title) }}',{{ $experience->id }})"
                                                    class="fas fa-check text-green-500 cursor-pointer"></i></td>
                                        @else
                                            <td class="px-8 py-3 "><i class="fas fa-check text-gray-500"></i></td>
                                        @endif
                                        <td class="px-8 py-3 "><a
                                                href="{{ route('experiencies.edit.admin', $experience) }}"><i
                                                    class="fas fa-pencil-alt text-blue-500"></i></a>
                                        </td>
                                        <td class="px-8 py-3 "><i
                                                onclick="deleteUser(event,'{{ addslashes($experience->title) }}',{{ $experience->id }})"
                                                class="fas fa-trash-alt text-red-500 cursor-pointer	"></i></td>
                                    </tr>
                                    @empty
                                        <tr>No hay experiencias en la base de datos</tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <br>
                            {{ $experiences->links() }}
                        </div>
                    </div>
                </div>
                <x-create-experience-form :places="$places" :hosts="$hosts" :languajes="$languajes"></x-create-experience-form>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.input-images').imageUploader({
                    label: 'Arrastra o hace click para subir las imagenes'
                });

            });

            function deleteUser(e, experience_name, experience_id) {
                e.preventDefault();

                Swal.fire({
                    title: 'Borrar experiencia',
                    text: '¿Estas seguro que quieres borrar la experiencia ' + experience_name + " ?",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: "#1e40af",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Borrar",
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('experiencies.destroy.admin') }}",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            type: 'DELETE',
                            data: {
                                experience_id: experience_id
                            },

                            success: (result) => {
                                location.reload();
                            },
                            failure: (result) => alert(msg_error),
                        }); //fin Ajax
                    } // fin If
                });
            };

            function approveExperience(e, experience_name, experience_id) {
                e.preventDefault();

                Swal.fire({
                    title: 'Aprobar experiencia',
                    text: '¿Estas seguro que quieres aprobar la experiencia ' + experience_name + " ?",
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonColor: "#1e40af",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Aprobar",
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('experiencies.approve.admin') }}",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            type: 'POST',
                            data: {
                                experience_id: experience_id
                            },

                            success: (result) => {
                                location.reload();
                            },
                            failure: (result) => alert(msg_error),
                        }); //fin Ajax
                    } // fin If
                });
            };
        </script>
@endsection
