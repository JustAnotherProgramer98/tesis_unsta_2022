<div id="show" class="tabcontent container items-center px-5 py-12 lg:px-20 hidden">

    <button
    onclick="openNewTab(event, 'index')"
    class="mb-4 bg-transparent hover:bg-paleta_tesis_celeste text-paleta_tesis_celeste font-semibold hover:text-white py-2 px-4 border border-paleta_tesis_celeste hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
    Volver </button>
    @if ($errors->any())
        <div class="text-center bg-blue-800 text-lg  text-white italic">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Experiencia</label>
            <div id="experience_name" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">Nombre de la experiencia</div>
        </div>
        <label for="name" class="text-base leading-7 ">Cupones</label>
        <div id="container_popover_buttons" class="flex flex-row relative p-8 gap-2 flex-wrap"></div>
        <div class="w-full pt-4 mb-4">
            <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear cupones</button>
        </div>
</div>
