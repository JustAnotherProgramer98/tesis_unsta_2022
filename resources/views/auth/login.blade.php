@extends('layouts.guest')
@section('content') 
<!-- component -->

<section class="bg-gradient-to-b h-screen from-paleta_tesis_gris">
<div class="w-full pt-12 md:w-3/5 px-4 mx-auto">
  
  <h2 class="text-center text-4xl font-semibold py-4 text-paleta_tesis_azul"><img width="150" height="150" src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo Registro">Bienvenido de vuelta!  <br></h2>
  
  <div  class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-2xl rounded-lg bg-blueGray-200 border-0">
    <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
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
      </div>
     
  
      <form method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf
        
        <div class="relative w-full mb-3">
          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Email</label>
          <input value="{{ old('email') }}" type="email" name="email" placeholder="Email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email">
        </div>

        <div class="relative w-full mb-3">
          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Contraseña</label>
          <input  id="password" type="password" name="password" placeholder="Contraseña" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Password">
        </div>
                
        <div class="text-center mt-6">
          <button class="bg-gray-700 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">Ingresar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>

@endsection 