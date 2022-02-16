<div id="host_register"
    class="tabcontent hidden relative flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
    <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
        <div class="text-blueGray-400 text-center mb-3 font-bold">
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <form enctype="multipart/form-data" action="{{ route('register.post') }}" method="POST" autocomplete="off">
            @csrf
            <input type="hidden" name="type_account" value="3">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Foto del frente de tu
                    DNI</label>
                <small class="text-gray-500 italic">Utilizaremos esta informacion para constatar que los datos son
                    validos</small>
                <div class="input-images mx-auto"></div>
            </div>
            <div class="flex gap-3">
                <div class="relative w-1/2 mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Nombre Anfitrion</label>
                    <input value="{{ old('name') }}" type="text" name="name" placeholder="Nombre"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                </div>
                <div class="relative w-1/2 mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Apellido</label>
                    <input value="{{ old('surname') }}" type="text" name="surname" placeholder="Apellido"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                </div>
            </div>
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Fecha de nacimiento</label>
                <input value="{{ old('birthday') }}" type="date" name="birthday"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Email">
            </div>
            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Cuit</label>
                <input value="{{ old('cuit') }}" type="text" name="cuit"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Cuit">
            </div>
            <div class="flex gap-3">
                <div class="relative w-1/2 mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Genero</label>
                    <select name="gender"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                        <option selected disabled hidden>Selecciona tu genero</option>
                        <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Masculino</option>
                        <option {{ old('gender') == 0 ? 'selected' : '' }} value="0">Femenino</option>
                    </select>
                </div>
                <div class="relative w-1/2 mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Numero de telefono</label>
                    <input value="{{ old('phone') }}" id="host_phone" placeholder="+XXX-(XXX)-XXXXXX" type="text"
                        name="phone"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                </div>
            </div>

            <div class="relative w-full mb-3">
                <label for="name" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Pais</label>
                <small class="text-gray-500">*Mas paises proximamente</small>
                <select
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    name="country_id">
                    <option value="1" selected>Argentina</option>
                </select>
            </div>

            <div class="flex gap-3">
                <div class="relative w-1/2 mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Provincia</label>

                    <select onchange="searchByProvinciaHost('{{ $url }}')" id="host_search_cities_by_province_id" name="province_id"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        >
                        @forelse ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @empty
                          
                        @endforelse
                    </select>
                </div>
                <div class="relative w-1/2 mb-3">
                    <label for="name" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Ciudad</label>
                    <select id="city_name_host"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        name="city_id">
                        <option value="X" selected hidden>Primero escoje una provincia</option>
                    </select>
                </div>
            </div>


            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Direccion de domicilio</label>
                <input value="{{ old('adress') }}" type="text" name="adress" placeholder="Direccion de domicilio"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Email">
            </div>

            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Email</label>
                <input value="{{ old('email') }}" type="email" name="email" placeholder="Email"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Email">
            </div>

            <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Contraseña"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Password">
                <input type="checkbox"
                    class="orm-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                    onclick="show_password()">
                <span class="ml-2 text-sm font-semibold text-blueGray-600">Mostrar Contaseña </span>
            </div>

            <div>
                <label class="inline-flex items-center cursor-pointer">
                    <input required id="customCheckLogin" type="checkbox"
                        class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                    <span class="ml-2 text-sm font-semibold text-blueGray-600">
                        Acepto los terminos y concidiciones de
                        <span class="text-paleta_tesis_celeste">TuristeAR</span>
                    </span>
                </label>
            </div>

            <div class="text-center mt-6">
                <button
                    class="bg-gray-700 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">Registrarse!</button>
            </div>
        </form>
    </div>
</div>

<script>
  //Search cities by Province_id
function searchByProvinciaHost(url) {
  var province_id = $("#host_search_cities_by_province_id option:selected").val();
  $.ajax({
      url:url,
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
              "content"
          ),
      },
      type: 'POST',
      data: {
          register:1,
          province_id: province_id
      },

      success: (result) => {
          $("#city_name_host").replaceWith(result);
      },
      failure: (result) => alert(msg_error),
  }); //fin Ajax 
}
</script>