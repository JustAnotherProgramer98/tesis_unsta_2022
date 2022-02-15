@extends('layouts.guest')
@section('content') 
<!-- component -->

<section class=" bg-blueGray-50">
<div class="w-full md:w-3/5 px-4 mx-auto pt-6">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
      <div class="text-blueGray-400 text-center mb-3 font-bold">
        @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <small>Registro de nuevo usuario </small>
      </div>
     
  
      <form action="{{ route('register.post') }}" method="POST" autocomplete="off">
        @csrf
        <div class="flex gap-3">
          <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Nombre</label>
            <input  value="{{ old('name') }}" autocomplete="off" type="text" name="name" placeholder="Nombre" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">  
          </div>
          <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Apellido</label>
            <input value="{{ old('surname') }}" autocomplete="off" type="text" name="surname" placeholder="Apellido" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">   
          </div>
        </div>
        <div class="relative w-full mb-3">
          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Fecha de nacimiento</label>
          <input value="{{ old('birthday') }}" autocomplete="off" type="date" name="birthday" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email">
        </div>
        <div class="flex gap-3">
          <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Genero</label>
            <select name="gender" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
              <option selected disabled hidden>Selecciona tu genero</option>
              <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Masculino</option>
              <option {{ old('gender') == 0 ? 'selected' : '' }} value="0">Femenino</option>
            </select>
          </div>
          <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Numero de telefono</label>
            <input value="{{ old('phone') }}" autocomplete="off" placeholder="+XXX-(XXX)-XXXXXX" type="text" id="phone" name="phone" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">   
          </div>
        </div>
        
        <div class="relative w-full mb-3">
          <label for="name" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Pais</label>
            <small class="text-gray-500">*Mas paises proximamente</small>
            <select class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="country_id" >
                <option value="1" selected>Argentina</option>
            </select>
        </div>

        <div class="flex gap-3">
          <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Provincia</label>
          @php
              $url=route('places.render.cities.admin');
          @endphp
          <select onchange="searchByProvincia('{{$url}}')" id="search_cities_by_province_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="province_id" >
              <option value="X" selected hidden>Selecciona una provincia</option>
              @forelse ($provinces as $province)
                  <option value="{{ $province->id }}">{{ $province->name }}</option>
          @empty
          @endforelse
          </select>  
          </div>
          <div class="relative w-1/2 mb-3">
            <label for="name" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Ciudad</label>
            <select id="city_name" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="city_id" >
                <option value="X" selected hidden>Primero escoje una provincia</option>
            </select>    
          </div>
        </div>

        
        <div class="relative w-full mb-3">
          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Direccion de domicilio</label>
          <input value="{{ old('adress') }}" type="text" name="adress" placeholder="Direccion de domicilio" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email">
        </div>
  
        <div class="relative w-full mb-3">
          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Email</label>
          <input value="{{ old('email') }}" type="email" name="email" placeholder="Email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email">
        </div>

        <div class="relative w-full mb-3">
          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Contraseña</label>
          <input  id="password" type="password" name="password" placeholder="Contraseña" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Password">
          <input type="checkbox" class="orm-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" onclick="myFunction()">
          <span class="ml-2 text-sm font-semibold text-blueGray-600">Mostrar Contaseña </span> 
        </div>

        <div>
          <label class="inline-flex items-center cursor-pointer">
            <input required id="customCheckLogin" type="checkbox" class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
            <span class="ml-2 text-sm font-semibold text-blueGray-600">
              Acepto los terminos y concidiciones de
              <a href="javascript:void(0)" class="text-pink-500">
                Turistear
              </a>
            </span>
          </label>
        </div>
                
        <div class="text-center mt-6">
          <button class="bg-gray-700 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">Registrarse!</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.0.7/imask.min.js" integrity="sha512-qCt/OTd55ilhuXLRNAp/G8uONXUrpFoDWsXDtyjV4wMbvh46dOEjvHZyWkvnffc6I2g/WHSKsaFUCm0RISxnzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    try {
        var phoneMask = IMask(
            document.getElementById("phone"),
            {
                mask: "+{000}-(000)-0000000",
            }
        );
    } catch (error) {
        console.log("No se pudo aplicar la mascara");
    }
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection 