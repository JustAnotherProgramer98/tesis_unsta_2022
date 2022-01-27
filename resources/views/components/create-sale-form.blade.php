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

    <form method="POST" class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12">
        @csrf
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Experiencia de la venta</label>
            <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="country_id" >
                <option value="X" selected hidden>Selecciona una experiencia</option>
                @forelse ($experiences as $experience)
                    <option value="{{ $experience->id }}">{{ $experience->title }}</option>
                @empty
                <option value="X" selected hidden>No hay experiencias aprobadas en la base de datos</option>
                @endforelse
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Usuario comprador</label>
            <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="buyer_id" >
                <option value="X" selected hidden>Selecciona un usuario</option>
                @forelse ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->surname }}</option>
                @empty
                    <option value="X" selected hidden>No hay usuarios en la base de datos</option>
                @endforelse
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Usuario beneficiario</label>
            <select class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 " name="beneficierie_id" >
                <option value="X" selected hidden>Selecciona un usuario</option>
                @forelse ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->surname }}</option>
                @empty
                    <option value="X" selected hidden>No hay usuarios en la base de datos</option>
                @endforelse
            </select>
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Precio a pagar</label><br>
            <small class="text-gray-500">**Si no ingresas la totalidad , el pago quedara pendiente de aprobacion</small>

            <input type="number" min="0" name="amount"
            class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Direccion</label>
            
        </div>
        <div class="relative p-4">
            <label for="name" class="text-base leading-7 ">Latitud y Longitud</label><br>
            <small class="text-gray-500">**Separa con una , la latitud de la longitud</small>
            <input  name="coordenates"
                class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
        </div>
        <div class="flex items-center w-full pt-4 mb-4">
            <button
                class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Crear
                lugar </button>
        </div>
    </form>
</div>
