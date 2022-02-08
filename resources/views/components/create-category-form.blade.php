<div id="create" class="tabcontent container items-center px-5 py-12 lg:px-20 hidden">
    <button
    onclick="openNewTab(event, 'index')"
    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
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

    <form method="POST" action="{{ route('categories.store.admin') }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12">
        @csrf
        <section class="flex flex-col w-full h-full p-1 overflow-auto">
            <label for="name" class="text-base leading-7  mb-5">Imagen de la categoria</label>
            <div class="input-images"></div>
        </section>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Titutlo de la categoria</label>
            <input autocomplete="off" placeholder="Titulo" name="title"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Descripcion de la categoria</label>
            <br>
            <textarea
                class="resize-none font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2"
                name="description" cols="30" rows="10" placeholder="Descripcion de la categoria"></textarea>
        </div>
        
        <div class="flex items-center w-full pt-4 mb-4">
            <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear categoria </button>
        </div>
    </form>
</div>
