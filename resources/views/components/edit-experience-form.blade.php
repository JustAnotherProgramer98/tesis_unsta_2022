<div id="edit" class="tabcontent container items-center px-5 py-12 lg:px-20">
    @if ($errors->any())
        <div class="text-center bg-blue-800 text-lg  text-white italic">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <h2 class="text-center">Editar la experiencia <span class="text-blue-500">{{ $experience->title }}</span></h2>
    <a href="{{ route('experiencies.index.admin') }}"
    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
    Volver
    </a>
    <form method="POST" action="{{ route('experiencies.update.admin',$experience) }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12">
        @method("PUT")
        @csrf
        <section class="flex flex-col w-full h-full p-1 overflow-auto">
            <label for="name" class="text-base leading-7  mb-5">Imagen de la experiencia</label>
            <header
                class="flex flex-col items-center justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                <input type="file" name="image_id"
                    class="w-auto px-2 py-1 my-2 mr-2  transition duration-500 ease-in-out transform border rounded-md hover:text-blueGray-600 text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-gray-100">
                Subir una imagen
            </header>
        </section>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Titulo de la Experiencia</label>
            <input placeholder="Titulo" name="title" value="{{ old('title', $experience->title) }}"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Subtitulo de la Experiencia</label>
            <input placeholder="Subtitulo" name="subtitle" value="{{ old('subtitle', $experience->subtitle) }}"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Descripcion de la experiencia</label>
            <br>
            <small class="text-gray-500">*Puede envever HTML para que luego sea interpretado por el
                sitio</small>
            <textarea
                class="resize-none font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2"
                name="description" cols="30" rows="10" placeholder="Descripcion de la experiencia">{{ old('description', $experience->description) }}"</textarea>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Ubicacion de la experiencia</label>
            <select name="place_id"
                class="text-gray-600 placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                @forelse ($places as $place)
                    <option value="{{ $place->id }}" {{( $experience->place->id == $place->id) ? 'selected' : '' }}>{{ $place->province }} - {{ $place->city }} - {{ $place->adress }}</option>
                @empty

                @endforelse
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Anfitrion de la experiencia</label>
            <select name="host_id"
                class="text-gray-600 placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                
                @forelse ($hosts as $host)
                    <option value="{{ $host->id }}" {{( $experience->host->id == $host->id) ? 'selected' : '' }} >{{ $host->name }}</option>
                @empty

                @endforelse
            </select>
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
            <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Actualizar la experiencia </button>
        </div>
    </form>
</div>
