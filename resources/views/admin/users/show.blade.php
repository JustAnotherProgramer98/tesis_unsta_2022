@extends('layouts.app')

@section('title_of_tab')
<div class="flex flex-row">
    <img width="150px" height="150px"  src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo">
    <p class="text-black font-bold text-2xl my-auto">Informacion sobre: <span class="text-paleta_tesis_celeste">{{ $user->name.' '.$user->surname}}</span></p>
</div>
@endsection

@section('content')
    @php
        $total_sales=0;
    @endphp
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        @if (session()->has('success'))
            <div class="alert alert-success">
                @if (is_array(session('success')))
                    <ul>
                        @foreach (session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success') }}
                @endif
            </div>
        @endif

        <div class="h-full">
            <div class="tabcontent container items-center px-5 py-12 lg:px-20">
                <a href="{{ route('users.index.admin') }}"
                    class="mb-4 bg-transparent hover:bg-paleta_tesis_celeste text-paleta_tesis_celeste font-semibold hover:text-white py-2 px-4 border border-paleta_tesis_celeste hover:border-transparent rounded">
                    <i class="fas fa-arrow-left"></i>
                    Volver
                </a>
                
                <section class="mt-12 flex flex-col w-full h-full p-1 overflow-auto">
                    <label for="name" class="text-base leading-7  mb-5">Dorso del DNI</label>
                    <section class="h-80 flex flex-row items-center gap-6 justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border-2 border-gray-300 rounded-lg  ring-offset-current ring-offset-2">
                        @if ($user->dni_picture)
                                <img width="620px" height="620px" class="m-4 rounded-md" src="{{asset('storage/'.$user->dni_picture)}}" alt="Imagen del DNI del usuario {{ $user->id }}">
                        @else
                        <i class="text-3xl fad fa-sad-tear"></i>
                        <label for="files">Este usuario no subio la foto de su DNI <br> </label>
                        @endif
                    </section>
                </section>

                <section class="mt-12 flex flex-col w-full h-full p-1 overflow-auto">
                    <label for="name" class="text-base leading-7  mb-5">Imagen del usuario</label>
                    <section class="h-80 flex flex-row items-center gap-6 justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border-2 border-gray-300 rounded-lg  ring-offset-current ring-offset-2">
                        @if ($user->images->first())
                                <img width="300px" height="300px" class="rounded-3xl m-4" src="{{asset('storage/'.$user->images->first()->url)}}" alt="{{ $user->images->first()->alt }}">
                        @else
                        <i class="text-3xl fad fa-sad-tear"></i>
                        <label for="files">Este usuario no cuenta con foto de perfil <br> </label>
                        @endif
                    </section>
                </section>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Estatus </label>
                    @switch($user->status)
                        @case(0)
                            <div
                                class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-red-700 bg-red-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                                <p>Inactivo</p>
                            </div>
                        @break
                        @case(1)
                            <div
                                class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-green-700 bg-green-100  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                                <p>Activo</p>
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
                    <label for="name" class="text-base leading-7 ">Fecha de registro al sistema</label>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>{{ $user->created_at }}</p>
                    </div>
                </div>
                <div class="relative p-4">
                    <label for="name" class="text-base leading-7 ">Informacion del usuario</label>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p><span class="text-paleta_tesis_celeste">Nombre: </span> {{ $user->name.' '.$user->surname }}</p>
                        <p><span class="text-paleta_tesis_celeste">Email: </span> {{ $user->email}}</p>
                        <p><span class="text-paleta_tesis_celeste">Telefono: </span> {{ $user->phone}}</p>
                        <p><span class="text-paleta_tesis_celeste">Genero: </span> {{ $user->gender==1 ? 'Masculino' : 'Femenino' }}</p>
                        <p><span class="text-paleta_tesis_celeste">Rol: </span> {{ $user->role->name}}</p>
                        <p ><span class="text-paleta_tesis_celeste">Fecha de nacimiento | Edad: </span> {{ $user->birthday}} | {{ \Carbon\Carbon::parse($user->birthday)->age.' años' }}</p>
                        <p class="{{ $user->introducing_me == '' ? 'text-red-500' : '' }}"><span class="text-paleta_tesis_celeste">Texto de presentacion en perfil: </span> {{ $user->introducing_me == '' ? 'Sin texto definido por el usuario' : $user->introducing_me}}</p>
                    </div>

                </div>
                <br>
                <br>
                <p>Datos de interaccion</p>
                <hr style="width: 90%" class="border border-paleta_tesis_celeste">
                
                <div class="relative p-4">
                    <div class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-purple-700 bg-purple-300  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>Relacion con experiencias</p>
                    </div>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <ul class="list-outside list-disc ">Experiencias que es anfitrion: {{  count($user->experiences)  }}
                            @forelse ($user->experiences as $experience)
                            <li class="text-blue-800 ml-6">
                                <div class="text-black hover:text-paleta_tesis_celeste"><a href="{{ route('experiencie.show.admin',$experience) }}" target="_blank">Experiencia: {{ $experience->title }}</a></div>
                                <li class="text-blue-800 ml-12">
                                    <div class="text-black hover:text-paleta_tesis_celeste"><a href="{{ route('user.show.admin',$experience->host) }}" target="_blank">Anfitrion: {{ $experience->host->name.' '.$experience->host->surname  }}</a></div>
                                </li>
                            </li>
                            @empty
                            <li class="text-red-700  ml-6">
                                <div class="text-red-500">Sin informacion para mostrar</div>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <ul class="list-outside list-disc ">Experiencias que es cliente: {{  count($user->sales)  }}
                            @forelse ($user->sales as $sale)
                            <li class="text-blue-800 ml-6">
                                <div class="text-black hover:text-paleta_tesis_celeste"><a href="{{ route('experiencie.show.admin',$sale->experience) }}" target="_blank">Experiencia: {{ $sale->experience->title }}</a></div>
                                <li class="text-blue-800 ml-12">
                                    <div class="text-black hover:text-paleta_tesis_celeste"><a href="{{ route('user.show.admin', $sale->experience->host) }}" target="_blank">Anfitrion: {{ $sale->experience->host->name.' '.$sale->experience->host->surname }}</a></div>
                                </li>
                            </li>
                            
                            @empty
                                <li class="text-red-700  ml-6">
                                    <div class="text-red-500">Sin informacion para mostrar</div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="relative p-4">
                    <div class="font-bold  placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg text-teal-700 bg-teal-300  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <p>Relacion con ventas</p>
                    </div>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <ul class="list-outside list-disc ">Experiencias que vendio: @foreach ($user->experiences as $experience ){{ $total_sales+=count($experience->sales) }}@endforeach
                            @forelse ($user->experiences as $experience)
                            <li class="text-blue-800 ml-6">
                                <div class="text-black hover:text-paleta_tesis_celeste"><a href="{{ route('experiencie.show.admin',$experience) }}" target="_blank">Experiencia: {{ $experience->title }}</a></div>
                            </li>
                            @empty
                            <li class="text-red-700  ml-6">
                                <div class="text-red-500">Sin informacion para mostrar</div>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 ">
                        <div class="list-outside list-disc flex flex-row  justify-evenly">
                            <div class="list-outside list-disc ">Dinero cobrado
                            <p class="text-center text-green-500">$ @php $revenue=0;@endphp
                                @foreach ($user->experiences as $experience )
                                    @foreach ($experience->sales as $sale )
                                        @php
                                        $revenue=$revenue+ (float)$sale->amount;
                                        @endphp
                                    @endforeach
                                    @if ($loop->last)
                                            {{  number_format($revenue,2) }}
                                    @endif
                                @endforeach
                                </p>
                            </div>
                            <div class="list-outside list-disc ">Comision TuristeAR
                                <p class="text-center text-paleta_tesis_celeste">$ {{ number_format(round(($revenue * 0.2) / 10) * 10,2) }}</p>
                            </div>
                            <div class="list-outside list-disc ">Ganancia Anfitrion
                                <p class="text-center text-orange-400">$ {{ number_format($revenue-round(($revenue * 0.2) / 10) * 10,2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
