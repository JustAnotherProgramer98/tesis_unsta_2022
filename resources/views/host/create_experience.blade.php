<div id="create" class=" tabcontent hidden">
    <br>
    <div class="flex gap-4 my-4 ">
        <form method="POST" action="{{ route('experiencies.store.admin') }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12 border rounded-lg border-purple-400">
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
                <label for="name" class="text-base leading-7 ">Descripcion de la experiencia</label>
                <br>
                <small class="text-gray-500">*Puede envever HTML para que luego sea interpretado por el
                    sitio</small>
                <textarea
                    class="resize-none font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2"
                    name="description" cols="30" rows="10" placeholder="Descripcion de la experiencia"></textarea>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Ubicacion de la experiencia</label>
                <select name="place_id"
                    class="text-gray-600 placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <option value="X" selected hidden>Selecciona una ubicacion</option>
                    {{-- @forelse ($places as $place)
                        <option value="{{ $place->id }}">{{ $place->city->province->name }} - {{ $place->city->name }} -
                            {{ $place->adress }}</option>
                    @empty
    
                    @endforelse --}}
                </select>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Anfitrion de la experiencia</label>
                <select name="host_id"
                    class="text-gray-600 placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <option value="X" selected hidden>Selecciona un anfitrion</option>
                    {{-- @forelse ($hosts as $host)
                        <option value="{{ $host->id }}">{{ $host->name }}</option>
                    @empty
    
                    @endforelse --}}
                </select>
            </div>
    
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Idiomas de la experiencia</label>
                <br>
                {{-- @forelse ($languajes as $languaje)
                    <input class="ml-3 my-2" type="checkbox" name="languajes[]" value="{{ $languaje->id }}" /> <label
                        for="languajes" class="label-check">{{ $languaje->title }}</label><br>
                @empty
                    <p>No hay lenguajes en la base de datos</p>
                @endforelse --}}
                <br />
            </div>
    
            <div class="flex items-center w-full pt-4 mb-4">
                <button
                    class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear
                    experiencia </button>
            </div>
        </form>
    </div>
</div>