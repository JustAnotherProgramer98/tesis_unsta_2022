@extends('layouts.guest')
@section('content')   
    <!-- component -->
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
    <div class="flex-1">
      @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif
      @if ($experiences)
        <x-cart-detail-component :experiences="$experiences"> </x-cart-detail-component>
      @else
      <tr>
        <p> No hay experiencias en el carrito ni en la compra , explora todas nuestras ofertas!</p>
      </tr>
      @endif
    </div>
  </div>
</div>
@endsection 