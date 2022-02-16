<div id="create" class=" tabcontent hidden px-4">
    <br>
    @if ($errors->any())
    <div class="text-center bg-blue-800 text-lg  text-white italic">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="flex gap-4 my-4 ">
      
        <form method="POST" autocomplete="off" action="{{ route('host.experiencies.store') }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12 border rounded-lg border-purple-400">
            @csrf
            <section class="flex flex-col w-full h-full p-1 overflow-auto">
                <label for="name" class="text-base leading-7  mb-5">Imagen de la experiencia</label>
                <div class="input-images"></div>
            </section>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Titulo de la Experiencia</label>
                <input placeholder="Titulo" name="title"
                    class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Subtitulo de la Experiencia</label>
                <input placeholder="Subtitulo" name="subtitle"
                    class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Precio de la experiencia</label><br>
                <input type="number" min="0" name="price" placeholder="Precio"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Cantidad de personas que pueden tomar la experiencia</label><br>
                <input type="number" min="0" name="quantity_clients" placeholder="Tamaño del grupo"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Descripcion de la experiencia</label>
                <br>
                <small class="text-gray-500">*Puede envever HTML para que luego sea interpretado por el
                    sitio</small>
                <textarea
                    class="resize-none font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2"
                    name="description" cols="30" rows="10" placeholder="Descripcion de la experiencia"></textarea>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Categoria de la experiencia</label>
                <input list="categories" name="category_name" placeholder="Categoria"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                <datalist class="w-full" id="categories">
                    @forelse ($categories as $category)
                        <option value="{{ $category->title }}">
                    @empty                        
                    <option value="No hay categorias aprobadas">
                    @endforelse
                </datalist>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Ubicacion de la experiencia</label>
                <input list="provinces" name="province_name" placeholder="Provincia"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                <datalist class="w-full" id="provinces">
                    @forelse ($provinces as $province)
                        <option value="{{ $province->name }}">
                    @empty                        
                    @endforelse
                </datalist>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Ciudad de la experiencia</label>
                <input list="cities" name="city_name" placeholder="Ciudad"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                <datalist class="w-full" id="cities">
                    @forelse ($places as $place)
                        <option value="{{ $place->city->name }}">
                    @empty                        
                    <option value="No hay lugares aprobados">
                    @endforelse
                </datalist>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Direccion de la experiencia</label>
                <input name="address" placeholder="Direccion de la ubicacion"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Indica en el mapa la ubicacion de tu experiencia</label>
                    <div id="mapa" style="margin-top: 2rem;width: 100%;height: 400px;border:2px solid transparent;"></div>             
                    <input type="hidden" name="coordinates" id="coordinates">
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Idiomas de la experiencia</label>
                <br>
                @forelse ($languajes as $languaje)
                    <input class="ml-3 my-2" type="checkbox" name="languajes[]" value="{{ $languaje->id }}" /> <label
                        for="languajes" class="label-check">{{ $languaje->title }}</label><br>
                @empty
                    <p>No hay lenguajes en la base de datos</p>
                @endforelse
                <br />
            </div>
    
            <div class="flex items-center w-full pt-4 mb-4">
                <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear experiencia </button>
            </div>
        </form>
    </div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB68RsG0J3b_BuRnHW1BTNBqam5rYHu58Y&callback=initMap"></script>
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