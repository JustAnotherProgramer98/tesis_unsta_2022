@extends('layouts.hosts')

@section('content')
<div class=" bg-purple-400 dark:bg-slate-700 w-full py-5 px-10">
    <div>
      <div class="sm:flex space-x-7 md:items-start items-center">
        <div class="mb-4">
          <img class="rounded-md md:w-80" src="https://cdn.pixabay.com/photo/2022/01/23/20/50/woman-6961929_960_720.jpg" alt="Image-User" />
        </div>
        <div>          
            <h1 class="text-gray-800 dark:text-slate-100 text-2xl font-bold my-2">{{ $user->name.' '.$user->surname }}</h1>
            <p class="text-gray-800 dark:text-slate-100 text-lg tracking-wide mb-6 md:max-w-lg whitespace-nowrap">Rol : {{ $user->role->name }}</p>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button>    
                  <span class="bg-white p-2 text-gray-800 dark:text-slate-100">Cerrar sesion</span>
              </button>
          </form>
        </div>
      </div>
    </div>
    <div class="sm:grid grid-cols-3 sm:space-x-4">
      <div class="bg-gray-100 dark:bg-slate-600 p-3 rounded-md mb-4">
        <span class="text-gray-800 dark:text-slate-400 text-md">Domicilio</span>
        <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold"> {{Str::limit($user->address,25,'...')  }}</h2>
      </div>
      <div class="bg-gray-100 dark:bg-slate-600 p-3 rounded-md mb-4">
        <span class="text-gray-800 dark:text-slate-400 text-md">Miembro desde</span>
        <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold">{{ $user->created_at }}</h2>
      </div>
      <div class="bg-gray-100 dark:bg-slate-600 p-3 rounded-md mb-4">
        <span class="text-gray-800 dark:text-slate-400 text-md">Twitter</span>
        <h2 class="text-gray-800 dark:text-slate-100 text-2xl font-semibold">traversymedia</h2>
      </div>
    </div>
    <div class="sm:flex flex-row sm:gap-4 gap-10">
      <div onclick="openNewTab(event, 'index')" style="box-shadow: 3px 3px rgb(107 33 168)" class="flex justify-between items-center bg-gray-100 dark:bg-slate-600 p-3 rounded-md  mb-4">
        <div class="mr-10">
            <i class="text-4xl text-cyan-500 fas fa-campground"></i>
        </div>
        <div >
          <span class="text-md text-slate-400">Experiencias</span>
          <h1 class="text-3xl font-bold text-gray-800 dark:text-slate-400">{{count($user->experiences)}}</h1>
        </div>
      </div>
      <div onclick="openNewTab(event, 'sales')" style="box-shadow: 3px 3px rgb(107 33 168)" class="flex justify-between items-center bg-gray-100 dark:bg-slate-600 p-3 rounded-md  mb-4">
        <div class="mr-10">
          <i class="text-4xl fas fa-dollar-sign text-green-500"></i>
      </div>
        <div>
          
          <span class="text-md text-slate-400">Ganancias</span>
          
          @php
              $balance=0;
            foreach ($user->experiences as $experience) {
              foreach ($experience->sales as $sale) {
                if ($sale->status=='1') {
                  $balance=$balance+$sale->amount;
                }
              }
            }
          @endphp
          <h1 class="text-3xl font-bold text-gray-800 dark:text-slate-400">$ {{ $balance }}</h1>
        </div>
        
      </div>
      <div onclick="openNewTab(event, 'index')" style="box-shadow: 3px 3px rgb(107 33 168)" class="flex justify-between items-center bg-gray-100 dark:bg-slate-600 p-3 rounded-md  mb-4">
        <div class="mr-10">
          <i class="text-4xl fas fa-comment-dollar text-rose-500"></i>
        </div>
        <div>
          <span class="text-md text-slate-400">Cupones de experiencias  </span>
          <span class="text-md text-slate-400">Totales | Usados </span>
          <h1 class="text-3xl font-bold text-gray-800 dark:text-slate-400">4.5</h1>
        </div>
      </div>
      <div class="flex justify-between items-center bg-gray-100 dark:bg-slate-600 p-3 rounded-md  mb-4">
        <div class="mr-10">
          <i class="text-4xl far fa-star text-yellow-500"></i>
        </div>
        <div>
          <span class="text-md text-slate-400">Valoracion promedio de experiencias </span>
          <h1 class="text-3xl font-bold text-gray-800 dark:text-slate-400">4.5</h1>
        </div>
      </div>
    </div>
  </div>

<div id="index" class="tabcontent block pt-10 px-4 ">
  <br>
  <div class="flex gap-4 my-4 ">
    <div class="relative w-1/2">
        <input type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar experiencia..." />
        <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
    </div>
    <button style="margin-top: auto;margin-bottom: auto" onclick="openNewTab(event, 'create')"
    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear una experiencia </button>
        <button style="margin-top: auto;margin-bottom: auto" id="button-popover" class="rounded-full border-2 border-blue-500 shadow-lg h-8 w-8" aria-describedby="tooltip">?</button>
        <div id="tooltip" role="tooltip"> Hace click en las primeras 3 columnas y mira el detalle de lo que quieras
            <div id="arrow" data-popper-arrow></div>
        </div>
  </div>
  @include('components.hosts.host_experience_table')
</div>
  @include('host.sales_index')
  @include('host.create_experience')

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('.input-images').imageUploader({
        label: 'Arrastra o hace click para subir las imagenes'
        imagesInputName: 'images',
      });
  });
  </script>
@endsection
