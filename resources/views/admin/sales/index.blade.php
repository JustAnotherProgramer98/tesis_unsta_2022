@extends('layouts.app')

@section('content')

    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Sidebar -->
        <x-admin-side-bar></x-admin-side-bar>
        <!-- ./Sidebar -->

        <div class="px-12 h-full ml-14 mt-14 mb-10 md:ml-64 overflow-hidden">
            <!-- Client Table -->
            <div id="index" class="tabcontent mt-4 mx-4 block">
                <h1>Tabla de ventas</h1>
                <hr class="border-1 border-slate-600">
                <br>
                <br>
                <div class="flex gap-4 mb-4">
                    <button style="margin-top: auto;margin-bottom: auto" onclick="openNewTab(event, 'create')"
                        class=" mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear
                        venta </button>

                    <div class="flex flex-row">
                        <input id="only_canceled_sales"
                            class="m-auto text-blue-500 w-8 h-8 mr-2 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded"
                            type="checkbox" />
                        <label class="my-auto inline-flex items-center">Solo ventas canceladas</label>
                    </div>
                </div>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table id="all_sales" class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3 whitespace-nowrap">Compra #nro</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Experiencia comprada</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Anfitrion de la experiencia</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Comprador</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Estado de la compra</th>
                                    <th class="px-4 py-3">Aprobar</th>
                                    <th class="px-4 py-3">Borrar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($sales as $sale)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $sale) }}">
                                                <p class="font-semibold capitalize">{{ $sale->id }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $sale) }}">
                                                <p class="font-semibold capitalize">{{ $sale->experience->title }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $sale) }}">
                                                <p class="font-semibold capitalize">{{ $sale->experience->host->name }}
                                                </p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('experiencie.show.admin', $sale) }}">
                                                <p class="font-semibold capitalize">{{ $sale->user->name }} </p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            @switch($sale->status)
                                                @case(0)
                                                    <span
                                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Cancelada
                                                    </span>
                                                @break
                                                @case(1)
                                                    <span
                                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Aprobada
                                                    </span>
                                                @break
                                                @default
                                                    <span
                                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                                        Pendiente de pago</span>
                                            @endswitch
                                        </td>
                                        @if ($sale->status == 2)
                                            <td class="px-8 py-3 "><i
                                                    onclick="approvesale(event,'{{ addslashes($sale->title) }}',{{ $sale->id }})"
                                                    class="fas fa-check text-green-500 cursor-pointer"></i></td>
                                        @else
                                            <td class="px-8 py-3 "><i class="fas fa-check text-gray-500"></i></td>
                                        @endif
                                        <td class="px-8 py-3 "><i
                                                onclick="deleteUser(event,'{{ addslashes($sale->title) }}',{{ $sale->id }})"
                                                class="fas fa-trash-alt text-red-500 cursor-pointer	"></i></td>
                                    </tr>
                                    @empty
                                        <tr>No hay ventas en la base de datos</tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <br>
                            {{ $sales->links() }}
                        </div>
                    </div>
                </div>
                
                <x-canceled-sales-table :sales="$sales->where('status',1)"></x-canceled-sales-table>
                {{-- <x-create-experience-form ></x-create-experience-form> --}}
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#only_canceled_sales').change(function() {
                    if ($(this).is(':checked')) {
                        // Do something...
                        alert('You can rock now...');
                    };
                });

            });

            function deleteUser(e, experience_name, experience_id) {
                e.preventDefault();

                Swal.fire({
                    title: 'Borrar venta',
                    text: '¿Estas seguro que quieres borrar la venta ?',
                    type: 'warning',
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
        </script>
    @endsection
