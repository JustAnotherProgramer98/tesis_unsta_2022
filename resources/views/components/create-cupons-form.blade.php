<div id="create" class="tabcontent hidden container items-center px-5 py-12 lg:px-20 ">

    <button
    onclick="openNewTab(event, 'index')"
    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>
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

    <form  method="POST" action="{{ route('coupons.store.admin') }}" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12">
        @csrf
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Cupones para la experiencia </label>
            <select name="experience_id" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                <option value="X" selected hidden>Selecciona una experiencia</option>
                @forelse ($experiences as $experience)
                    <option value="{{ $experience->id }}">{{ $experience->title }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Cantidad de cupones</label><br>
            <input onchange="limiter_cuppons(this)" type="number" min="1" name="quantity_coupons" placeholder="Cantidad de cupones"
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Porcentaje de descuento</label>
            <input onchange="limiter_discount(this)" type="number" min="0" maxlength="3" max="100" name="percentaje_coupons" placeholder="% porcentaje de descuento"
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>

        <div class="flex items-center w-full pt-4 mb-4">
            <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear cupones</button>
        </div>
    </form>
</div>