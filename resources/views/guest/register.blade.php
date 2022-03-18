@extends('layouts.guest')
@section('content')
    <!-- component -->

    <section class="bg-gradient-to-b  from-paleta_tesis_gris">
        <div class="w-full md:w-3/5 px-4 mx-auto pt-6">

            <h2 class="text-center text-4xl font-semibold py-4 text-paleta_tesis_azul"><img width="150" height="150"
                    src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo Registro">Forma parte de  Turistear <br> <span
                    class="text-paleta_tesis_celeste">Animate a explorar el mundo</span> <i class="text-paleta_tesis_celeste fal fa-globe-americas"></i> </h2>
            <div class="flex my-6">
                <input  onclick="openNewTab(event, 'client_register')"
                    name="account_type[]" type="checkbox"
                    class="form-checkbox bg-blue-400 border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                <span class="ml-2 text-sm font-semibold text-blueGray-600 mr-6">Cuenta cliente </span>
                <input  onclick="openNewTab(event, 'host_register')"
                    name="account_type[]" type="checkbox"
                    class="form-checkbox bg-blue-400 border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                <span class="ml-2 text-sm font-semibold text-blueGray-600">Cuenta anfitrion </span>
            </div>
            <div id="client_register"
                class="tabcontent relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
                    <div class="text-blueGray-400 text-center mb-3 font-bold">
                        @if ($errors->any())
                            <div class="">
                                    @foreach ($errors->all() as $error)
                                        <h4 class="pl-4 text-red-700 rounded-md bg-red-100 m-4 p-2 shadow-lg  text-2xl "><i class="pr-4 fas fa-times text-red-700 text-2xl"></i>{{$error}}</h4>
                                    @endforeach
                            </div>
                        @endif
                    </div>


                    <form  class="form-register-modal" action="{{ route('register.post') }}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="type_account" value="2">
                        <div class="flex gap-3">
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Nombre</label>
                                <input value="{{ old('name') }}" autocomplete="off" type="text" name="name"
                                    placeholder="Nombre"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Apellido</label>
                                <input value="{{ old('surname') }}" autocomplete="off" type="text" name="surname"
                                    placeholder="Apellido"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Fecha de nacimiento</label>
                            <input value="{{ old('birthday') }}" autocomplete="off" type="date" id="birthday" name="birthday" min="1920-01-01"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                        </div>
                        <div class="flex gap-3">
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Genero</label>
                                <select name="gender"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    <option selected disabled hidden>Selecciona tu genero</option>
                                    <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Masculino</option>
                                    <option {{ old('gender') == 0 ? 'selected' : '' }} value="0">Femenino</option>
                                </select>
                            </div>
                            <div class="w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Nro. de telefono</label>
                                <input value="{{ old('phone') }}" id="phone" autocomplete="off"
                                    placeholder="+XXX-(XXX)-XXXXXX" type="text" name="phone"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                        <div class="w-full mb-3">
                            <label for="name" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Pais</label>
                            <small class="text-gray-500">*Mas paises proximamente</small>
                            <select
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                name="country_id">
                                <option value="1" selected>Argentina</option>
                            </select>
                        </div>

                        <div class="sm:grid sm:grid-flow-row sm:auto-rows-max lg:flex lg:flex-row lg:gap-3">
                            <div class="w-full md:w-1/2 mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Provincia</label>
                                @php
                                    $url = route('places.render.cities.admin');
                                @endphp
                                <select onchange="searchByProvincia('{{ $url }}')"
                                    id="search_cities_by_province_id"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    name="province_id">
                                    <option value="X" selected hidden>Selecciona una provincia</option>
                                    @forelse ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 mb-3">
                                <label for="name"
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Ciudad</label>
                                <select id="city_name"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    name="city_id">
                                    <option value="X" selected hidden>Primero escoje una provincia</option>
                                </select>
                            </div>
                        </div>
                        <div class=" w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Direccion de domicilio</label>
                            <input value="{{ old('adress') }}" type="text" name="adress"
                                placeholder="Direccion de domicilio"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                        </div>

                        <div class=" w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" placeholder="Email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                        </div>

                        <div class=" w-full mb-3">
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
                                <input required type="checkbox" oninvalid="this.setCustomValidity('Debes aceptar los terminos y condiciones para continuar')" oninput="this.setCustomValidity('')"
                                    class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                    Acepto los terminos y concidiciones de
                                    <span class="text-paleta_tesis_celeste">turisteAR</span>
                                </span>
                            </label>
                        </div>

                        <div class="text-center mt-6">
                            <button class="client_form_register bg-gray-700 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">Registrarse!</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('components.hosts.host_register')
        </div>
    </section>

    <div style="background-color: #f4f4f4" id="loading" class="hidden mx-auto bg-paleta_tesis_blanco  absolute top-1/4 w-full md:w-1/2 md:ml-96 max-h-max text-center  bottom-1/4 ">
        <p class="text-4xl font-semibold py-4 text-paleta_tesis_azul md:mx-24">Haciendote lugarcito en nuestro corazon... <i class="text-red-500 animate-ping fas fa-heart"></i></i></p>  
        <div class="h-auto w-auto md:h-80 md:w-80 object-contain mx-auto">
            <img class=" block" src="{{ asset('gifs/plane_spinning.gif') }}" alt="Formularrio de alta">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.0.7/imask.min.js" integrity="sha512-qCt/OTd55ilhuXLRNAp/G8uONXUrpFoDWsXDtyjV4wMbvh46dOEjvHZyWkvnffc6I2g/WHSKsaFUCm0RISxnzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) dd = '0' + dd;

        if (mm < 10) mm = '0' + mm; 
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("birthday_anfi").setAttribute("max", today);
        document.getElementById("birthday").setAttribute("max", today);

        $(".form-register-modal").submit(function( event ) {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            $( "body > *:not(#loading)" ).addClass( "blur-sm" );
            $(".client_form_register").prop("disabled", true);
            $('#loading').show();
        });


       

        var phoneMask = IMask(
            document.getElementById("phone"), {
                mask: "+{000}-(000)-0000000",
            }
        );
        var HostphoneMask = IMask(
            document.getElementById("host_phone"), {
                mask: "+{000}-(000)-0000000",
            }
        );
        $(document).ready(function(event) {
            $('.input-images').imageUploader({
                label: 'Arrastra o hace click para subir tu DNI',
                imagesInputName: 'imagen_dni',
                maxFiles: 1
            });
            
            var last_input=@json(old('type_account'));
            var elements=$('.form-checkbox');
            if (last_input==null ) $('.form-checkbox')[0].checked = true;
            else if (last_input==2) $('.form-checkbox')[0].checked = true;
            else {
                $('.form-checkbox')[1].checked = true;
                openNewTab(event, 'host_register');
            }
            
     
        });
        $('input[type="checkbox"]').on('change', function() {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });
    </script>
@endsection
