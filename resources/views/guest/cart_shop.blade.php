@extends('layouts.guest')
@section('content')   
    <!-- component -->
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white pin-r pin-y md:w-4/5 lg:w-4/5">
    <div class="flex-1">
      @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif
      @if ($experiences)
        <x-cart-detail-component :experiences="$experiences"> </x-cart-detail-component>
      @else
      <div class="w-full md:w-4/12 mx-auto px-4 my-10 text-center">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
          <div class="px-4 py-5 flex-auto">
            <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-paleta_tesis_celeste">
              <span class="inline-block  text-blue-500 dark:text-blue-400">
                <i class="fal fa-shopping-cart text-6xl text-paleta_tesis_blanco"></i>
              </span>
            </div>
            <h6 class="text-xl font-semibold">Nada por aqui , nada por alla</h6>
            <p class="mt-2 mb-4 text-gray-600">Aun no agregaste experiencias al carrito <br> <span class="text-paleta_tesis_azul ">Animate a explorar todas las opciones!</span></p>
            
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection 