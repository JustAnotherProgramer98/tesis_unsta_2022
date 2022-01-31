@extends('layouts.app')

@section('title_of_tab')
    <p class="text-purple-500 font-bold  text-2xl">Usuarios</p>
@endsection
@section('content')
    <div class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        <div class="h-full overflow-hidden">
            <!-- Client Table -->
            <div id="index" class="tabcontent mt-4 mx-4 block">

                <div class="flex gap-4 mb-4">
                    <div class="relative w-1/2">
                        <form action="{{ route('users.search') }}" method="GET">
                            <input autocomplete="off" type="text" name="search" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar usuarios..." />
                            <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </form>
                    </div> 
                </div>
                
                </button>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nombre completo</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Edad</th>
                                    <th class="px-4 py-3">Experiencias compradas</th>
                                    <th class="px-4 py-3">Rol</th>
                                    <th class="px-4 py-3">Fecha de creacion</th>
                                    <th class="px-4 py-3">Estado</th>
                                    <th class="px-4 py-3">Restaurar</th>
                                    <th class="px-4 py-3">Borrar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($users as $user)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $user) }}">
                                                <p class="font-semibold capitalize">{{ Str::limit($user->name.' '.$user->surname, 15, '...') }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $user) }}">
                                                <p class="font-semibold">{{ Str::limit($user->email, 15, '...') }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $user) }}">
                                                <p class="font-semibold">{{ \Carbon\Carbon::parse($user->birthday)->age; }} años</p>
                                                {{-- <p class="font-semibold">{{ date_diff(date_create($user->birthday),date_create(\Carbon\Carbon::now())) }}</p> --}}
                                                {{-- <p class="font-semibold capitalize">{{ Str::limit($experience->place->city->province->name.' - '.$experience->place->city->name,20) }}</p> --}}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <p class="font-semibold whitespace-nowrap pl-8">{{ count($user->sales)>0 ? count($user->sales).' Experiencias' : 'Sin experiencias'}}  </p>
                                        </td>
                                        <td class="px-4 py-3">
                                            @switch($user->role->name)
                                            @case('Admin')
                                                <span
                                                    class="cursor-default px-2 py-1 font-semibold leading-tight text-sky-700 bg-sky-100 rounded-full dark:text-sky-100 dark:bg-sky-700">Admin
                                                </span>
                                            @break
                                            @case('Anfitrion')
                                                <span
                                                    class="cursor-default px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full dark:bg-purple-700 dark:text-purple-100">Anfitrion
                                                </span>
                                            @break
                                            @default
                                                <span style="background-color: #6495ed" class="cursor-default px-2 py-1 font-semibold leading-tight text-gray-200 rounded-full">Cliente</span>
                                        @endswitch
                                        </td>
                                        <td class="px-4 py-3">
                                            <p class="font-semibold ">{{($user->created_at)->format('Y-m-d');}}  </p>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">Eliminado</span>
                                        </td>
                                        @if ($user->status != 1)
                                            <td class="px-8 py-3 "><i
                                                    onclick="approveUser(event,'{{ addslashes($user->name.' '.$user->surname) }}',{{ $user->id }})"
                                                    class="fas fa-check text-green-500 cursor-pointer"></i></td>
                                        @else
                                            <td class="px-8 py-3 "><i class="fas fa-check text-gray-500"></i></td>
                                        @endif
                                        <td class="px-8 py-3 "><i
                                                onclick="deleteUser(event,'{{ addslashes($user->name.' '.$user->surname) }}',{{ $user->id }})"
                                                class="fas fa-trash-alt text-red-500 cursor-pointer	"></i></td>
                                    </tr>
                                    @empty
                                        <tr>No hay usuarios borrados en la base de datos</tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <br>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                {{-- <x-create-experience-form :places="$places" :hosts="$hosts" :languajes="$languajes"></x-create-experience-form> --}}
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
                    title: 'Borrar usuario',
                    text: '¿Estas seguro que quieres borrar definitivamente a ' + experience_name + " ?",
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonColor: "#1e40af",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Borrar",
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('users.forcedelete.admin') }}",
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

            function approveUser(e, experience_name, experience_id) {
                e.preventDefault();

                Swal.fire({
                    title: 'Resturar usuario',
                    text: '¿Estas seguro que quieres restaurar al usuario ' + experience_name + " ?",
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonColor: "#1e40af",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Aprobar",
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('users.restore.admin') }}",
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
