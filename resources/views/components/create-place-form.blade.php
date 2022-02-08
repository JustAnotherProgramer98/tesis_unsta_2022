<div id="create" class="tabcontent container items-center hidden">

    <button
    onclick="openNewTab(event, 'index')"
    class="mb-4 ml-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
    Volver
    </button>
    @if ($errors->any())
        <div class="text-center bg-blue-800 text-lg  text-white italic">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('places.store.admin') }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12">
        @csrf
        <section class="flex flex-col w-full h-full p-1 overflow-auto">
            <label for="name" class="text-base leading-7  mb-5">Imagen del lugar</label>
            <div class="input-images"></div>
        </section>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Pais</label>
            <br>
            <small class="text-gray-500">*Mas paises proximamente</small>
            <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="country_id" >
                <option value="1" selected>Argentina</option>
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Provincia</label>
            @php
                $url=route('places.render.cities.admin');
            @endphp
            <select onchange="searchByProvincia('{{$url}}')" id="search_cities_by_province_id" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="province_id" >
                <option value="X" selected hidden>Selecciona una provincia</option>
                @forelse ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
            @empty
            @endforelse
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Ciudad</label>
            <select id="city_name" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="city_id" >
                <option value="X" selected hidden>Primero escoje una provincia</option>
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Direccion</label>
            <input name="adress"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Latitud y Longitud</label><br>
            {{-- Mapa de google maps --}}
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Indica en el mapa la ubicacion de tu experiencia</label>
                <div id="mapa" style="margin-top: 2rem;width: 100%;height: 400px;border:2px solid transparent;"></div>             
                <input type="hidden" name="coordinates" id="coordinates">
        </div>

        </div>
        <div class="flex items-center w-full pt-4 mb-4">
            <button
                class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear
                lugar </button>
        </div>
    </form>
</div>
