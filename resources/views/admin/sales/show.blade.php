@extends('layouts.app')

@section('title_of_tab')
<div class="flex flex-row">
    <img width="150px" height="150px"  src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo">
    <p class="text-paleta_tesis_celeste font-bold text-2xl my-auto">Ventas</p>
</div>
@endsection


@section('content')

<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
    <div class="h-full">
        <div class="tabcontent container items-center px-5 py-12 lg:px-20">
            <a href="{{ route('sales.index.admin') }}"
                class="mb-4 bg-transparent hover:bg-paleta_tesis_celeste text-paleta_tesis_celeste font-semibold hover:text-white py-2 px-4 border border-paleta_tesis_celeste hover:border-transparent rounded"><i class="fas fa-arrow-left"></i>Volver
            </a>

            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Informacion de la venta</label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p><span class="text-paleta_tesis_celeste">Nro. de venta: </span> {{ $sale->id }}</p>
                </div>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Fecha de venta</label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p> {{ $sale->created_at->format('d/m/Y')}} - {{ $sale->created_at->format('H:i:s');}}</p>
                </div>
            </div>

            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Informacion del anfitrion</label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p><span class="text-paleta_tesis_celeste">Nombre: </span> {{ $sale->experience->host->name.' '.$sale->experience->host->surname }}</p>
                    <p><span class="text-paleta_tesis_celeste">Cuit: </span> {{ $sale->experience->host->cuit}}</p>
                    <p><span class="text-paleta_tesis_celeste">Email: </span> {{ $sale->experience->host->email}}</p>
                    <p><span class="text-paleta_tesis_celeste">Telefono: </span> {{ $sale->experience->host->phone}}</p>
                    <p><span class="text-paleta_tesis_celeste">Estado: </span> {{ $sale->experience->host->status==1 ? 'Verificado' : 'No verificado' }}</p>
                </div>
                
            </div>

            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Informacion del cliente</label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p><span class="text-paleta_tesis_celeste">Nombre: </span> {{ $sale->user->name.' '.$sale->user->surname }}</p>
                    <p><span class="text-paleta_tesis_celeste">Email: </span> {{ $sale->user->email}}</p>
                    <p><span class="text-paleta_tesis_celeste">Telefono: </span> {{ $sale->user->phone}}</p>
                    <p><span class="text-paleta_tesis_celeste">Estado: </span> {{ $sale->user->status==1 ? 'Verificado' : 'No verificado' }}</p>
                </div>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Estado del pago </label>
                @switch($sale->status)
                    @case(0)
                        <div
                            class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-red-700 bg-red-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                            <p>Fallo / impago</p>
                        </div>
                    @break
                    @case(1)
                        <div
                            class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-green-700 bg-green-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                            <p>Pago realizado</p>
                        </div>
                    @break
                    @default
                        <div
                            class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-yellow-700 bg-yellow-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                            <p>Pendiente de aprobacion</p>
                        </div>
                @endswitch
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Precio pagado</label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p>Precio cobrado: <span class="text-green-700">$ {{ $sale->amount }} </span></p>
                    <p>Ganancias del anfitrion: <span class="text-green-700">$ {{ $sale->amount - round(($sale->amount*0.2)) }}</span></p>
                    <p>Ganancia comision Turistear: <span class="text-green-700">$ {{ round(($sale->amount*0.2))}} </span></p>
                </div> 
            </div>
            <br>
            <br>
            <p>Datos de la experiencia</p>
            <hr style="width: 90%" class="border border-paleta_tesis_celeste">


            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Informacion de la experiencia</label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p><span class="text-paleta_tesis_celeste">Nombre: </span> {{ $sale->experience->title }}</p>
                    <p><span class="text-paleta_tesis_celeste">Categorias: </span>@foreach ($sale->experience->categories  as $category ) {{ $category->title}} @if ($loop->last) @else - @endif  @endforeach</p>
                    
                    <p><span class="text-paleta_tesis_celeste">Pais: </span> {{ $sale->experience->place->city->province->country->name}}</p>
                    <p><span class="text-paleta_tesis_celeste">Provincia: </span> {{ $sale->experience->place->city->province->name}}</p>
                    <p><span class="text-paleta_tesis_celeste">Ciudad: </span> {{ $sale->experience->place->city->name}}</p>
                    <p><span class="text-paleta_tesis_celeste">Direccion: </span> {{ $sale->experience->place->adress}}</p>
                    <p><span class="text-paleta_tesis_celeste">Estado: </span> {{ $sale->experience->status==1 ? 'Verificado' : 'No verificado' }}</p>
                </div>
            </div>

            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Fecha de creacion </label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    <p> {{ $sale->experience->created_at->format('d/m/Y')}} - {{ $sale->experience->created_at->format('H:i:s');}}</p>
                </div>
            </div>
            <div class="relative p-4">
                <label for="name" class="text-base leading-7 ">Feedback de la experiencia </label>
                <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                    @if ($sale->experience->comments->where('user_id',$sale->user->id)->where('experience_id',$sale->experience->id)->first())
                        <p class="text-paleta_tesis_celeste"> Comentario:           <span class="text-black">{{ $sale->experience->comments->where('user_id',$sale->user->id)->where('experience_id',$sale->experience->id)->first()->body}} </span></p>
                        <p class="text-paleta_tesis_celeste"> Numero de estrellas:  <span class="text-black">{{ $sale->experience->comments->where('user_id',$sale->user->id)->where('experience_id',$sale->experience->id)->first()->stars}} </span></p>
                    @else
                        <p class="text-paleta_tesis_celeste"> Comentario:           <span class="text-black">Sin Feedback aun</span></p>
                        <p class="text-paleta_tesis_celeste"> Numero de estrellas:  <span class="text-black">Sin Feedback aun</span></p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
