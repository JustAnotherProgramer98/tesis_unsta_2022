@extends('layouts.app')

@section('title_of_tab')
    <p class="text-purple-500 font-bold text-2xl">Lugares</p>
@endsection

@section('content')

    <div class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        <div>
            <!-- Client Table -->
            <div id="index" class="tabcontent mt-4 mx-4 block">
                <div class="flex gap-4 mb-4">
                    <div class="relative w-1/2">
                        <input type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar lugar..." />
                        <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button style="margin-top: auto;margin-bottom: auto" onclick="openNewTab(event, 'create')"
                    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear

                    un lugar
                </button>
                        <button style="margin-top: auto;margin-bottom: auto" id="button-popover" class="rounded-full border-2 border-blue-500 shadow-lg h-8 w-8" aria-describedby="tooltip">?</button>
                        <div id="tooltip" role="tooltip"> Hace click en las primeras 3 columnas y mira el detalle del lugar
                            <div id="arrow" data-popper-arrow></div>
                        </div>
                </div>
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
                                    <th class="px-4 py-3 whitespace-nowrap">Exp. en el lugar</th>
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
                                            <a href="{{ route('place.show.admin', $place) }}">
                                                <p class="font-semibold uppercase">
                                                    {{ $place->city->province->country->name }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer">
                                            <a href="{{ route('place.show.admin', $place) }}">
                                                <p class="font-semibold">{{ Str::limit($place->city->province->name, 15) }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer">
                                            <a href="{{ route('place.show.admin', $place) }}">
                                                <p class="font-semibold">{{ Str::limit($place->city->name, 10) }}</p>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer">
                                                <p class="font-semibold capitalize">{{ Str::limit($place->adress, 25) }}</p>
                                        </td>
                                        <td class="text-center px-4 py-3 cursor-pointer">
                                            <p class="font-semibold capitalize">{{ $place->experiences_count }}</p>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
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
                                            <td class="px-8 py-3 "><i onclick="approvePlace(event,{{ $place->id }})"
                                                    class="fas fa-check text-green-500 cursor-pointer"></i></td>
                                        @else
                                            <td class="px-8 py-3 "><i class="fas fa-check text-gray-500"></i></td>
                                        @endif
                                        <td class="px-8 py-3 "><a href="{{ route('places.edit.admin', $place) }}"><i
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

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.input-images').imageUploader({
                    label: 'Arrastra o hace click para subir las imagenes',
                    imagesInputName: 'images',
                    maxFiles:1,
                });

            });

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
                                location.reload();
                            },
                            failure: (result) => alert(msg_error),
                        }); //fin Ajax
                    } // fin If
                });
            };

            function approvePlace(e, place_id) {
                e.preventDefault();

                Swal.fire({
                    title: 'Aprobar lugar',
                    text: '¿Estas seguro que quieres aprobar este lugar  ?',
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonColor: "#1e40af",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Aprobar",
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('places.approve.admin') }}",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            type: 'POST',
                            data: {
                                place_id: place_id
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
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBH-_Wnc-2JkqJ1xHKJD8ggIGlnBT1yMY&callback=initMap"></script>
        <script>
            function initMap() {
                // Coordenadas de Tucuman
                const tucuman = {
                    lat: -26.8198,
                    lng: -65.2169
                };

                const map = new google.maps.Map(document.getElementById("mapa"));
                navigator.geolocation.getCurrentPosition(function(position) {

                    // Mapa centrado en la posicion del usuario si acepta la geolocalizacion
                    var initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    map.setCenter(initialLocation);
                    map.setZoom(13);
                }, function(positionError) {
                    // User denied geolocation prompt - default Tucuman
                    map.setCenter(new google.maps.LatLng(tucuman));
                    map.setZoom(5);
                });
                var marker;

                function placeMarker(location) {
                    if (marker) {
                        marker.setPosition(location);
                        document.getElementById("coordinates").value=location;

                    } else {
                        marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            label:'Aqui!'
                        });
                        document.getElementById("coordinates").value=location;

                    }
                    console.log(document.getElementById("coordinates").value);

                }

                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(event.latLng);
                });
            }
        </script>
    @endsection