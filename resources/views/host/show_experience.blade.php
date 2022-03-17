<div id="show_experience_detail" class="tabcontent container items-center px-5 py-12 lg:px-20 hidden">
    
    <section class="flex flex-col w-full h-full p-1 overflow-auto">
        <label for="name" class="text-base leading-7  mb-5">Imagen de la experiencia</label>
        <header
            class="flex flex-col items-center justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
            @if (Auth::user()->experiences->first())
                @if (Auth::user()->experiences->first()->images->first())
                    <img id="experience_image" src="{{asset(Auth::user()->experiences->first()->images->first()->url)}}">
                @endif
            @endif
        </header>
    </section>
    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Titulo de la Experiencia</label>
        <div
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            <p id="experience_title"></p>
        </div>
    </div>

    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Subtitulo de la Experiencia</label>
        <div
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            <p id="experience_subtitle"></p>
        </div>
    </div>
    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Descripcion de la experiencia</label>
        <br>
        <div style="height: 10rem !important"
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2">
            <p id="experience_description"></p>
        </div>
    </div>
    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Ubicacion de la experiencia</label>
        <div
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            <p id="experience_province"><span class="text-blue-800">Provincia: </span></p>
            <p id="experience_city"><span class="text-blue-800">Ciudad: </span> </p>
            <p id="experience_addres"><span class="text-blue-800">Direccion: </span></p>

        </div>

    </div>
    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Anfitrion de la experiencia</label>
        <div
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">

        </div>
    </div>

    <br>
    <br>
    <p>Datos de la Experiencia</p>
    <hr>

    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Estatus </label>

    </div>
    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Fecha de creacion</label>
        <div
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">

        </div>
    </div>

    <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Cantidad de usuarios que la compraron</label>
        <div
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
            <p></p>
        </div>
    </div>
</div>

