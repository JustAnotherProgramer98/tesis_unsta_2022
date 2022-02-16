@extends('layouts.guest')
@section('content')
    <!-- component -->

    <section class=" bg-gradient-to-b  from-paleta_tesis_gris">
        <div class="w-full md:w-3/5 px-4 mx-auto pt-6">

            <h2 class="text-center text-4xl font-semibold py-4 text-paleta_tesis_azul"><img width="150" height="150"
                    src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo Registro">Informacion de usuario</h2>

            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                <p class="text-gray-800 dark:text-slate-400 text-md">Rol de usuario
                    @switch(Auth::user()->role->name)
                  @case('Admin')
                      <span class="cursor-default px-2 my-6 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Administrador
                      </span>
                  @break
                  @case('Cliente')
                      <span class="cursor-default px-2 my-6 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Cliente
                      </span>
                  @break
                  @default
                      <span class="cursor-default px-2 my-6 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                          Anfitrion</span>
                  @endswitch
                <div class="flex-auto px-4 lg:px-10 py-10 pt-10">
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

                    <form action="#" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="type_account" value="2">
                        <div class="flex gap-3">
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Nombre</label>
                                <input value="{{ old('name',Auth::user()->name) }}" autocomplete="off" type="text" name="name"
                                    placeholder="Nombre"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Apellido</label>
                                <input value="{{ old('surname',Auth::user()->surname) }}" autocomplete="off" type="text" name="surname"
                                    placeholder="Apellido"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Fecha de
                                nacimiento</label>
                            <input value="{{ old('birthday',Auth::user()->birthday) }}" autocomplete="off" type="date" name="birthday"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                        </div>
                        <div class="flex gap-3">
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Genero</label>
                                <select name="gender"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    <option selected disabled hidden>Selecciona tu genero</option>
                                    <option {{ old('gender',Auth::user()->gender) == 1 ? 'selected' : '' }} value="1">Masculino</option>
                                    <option {{ old('gender',Auth::user()->gender) == 0 ? 'selected' : '' }} value="0">Femenino</option>
                                </select>
                            </div>
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Numero de
                                    telefono</label>
                                <input value="{{ old('phone',Auth::user()->phone) }}" id="phone" autocomplete="off"
                                    placeholder="+XXX-(XXX)-XXXXXX" type="text" name="phone"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                        <div class="w-full mb-3">
                            <label for="name" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Pais</label>
                            <select
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                name="country_id">
                                <option value="1" selected>Argentina</option>
                            </select>
                        </div>

                        <div class="flex gap-3">
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Provincia</label>
                                <input value="{{ old('province',Auth::user()->province) }}" type="text" name="province"
                                placeholder="Provincia" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                            <div class="w-1/2 mb-3">
                                <label for="name"
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Ciudad</label>
                                    <input value="{{ old('city',Auth::user()->city) }}" type="text" name="city"
                                    placeholder="Provincia" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class=" w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Direccion de
                                domicilio</label>
                            <input value="{{ old('adress',Auth::user()->address) }}" type="text" name="adress"
                                placeholder="Direccion de domicilio"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                        </div>

                        <div class=" w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Email</label>
                            <input value="{{ old('email',Auth::user()->email) }}" type="email" name="email" placeholder="Email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                        </div>

                        <div class=" w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nueva contraseña</label>
                            <input id="password" type="password" name="password" placeholder="Contraseña"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            
                            <label class="mt-4 block uppercase text-blueGray-600 text-xs font-bold mb-2">Repetir contraseña</label>
                            <input id="password2" type="password" name="password2" placeholder=""
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <br>
                            <input type="checkbox"
                                class="orm-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                onclick="show_password()">
                            <span class="ml-2 text-sm font-semibold text-blueGray-600">Mostrar Contaseña </span>
                        </div>

                        <div class="text-center mt-6">
                            <button class="bg-gray-700 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">Actualizar datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
