@extends('layouts.guest')
@section('content') 

    <!-- contacto -->
    <div class="flex items-center min-h-screen bg-gradient-to-b  from-paleta_tesis_gris dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="mx-auto lg:w-5/6 my-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h2 class="text-center text-4xl font-semibold py-4 text-paleta_tesis_azul"><img width="150" height="150"
                        src="{{ asset('images/Turistear.png') }}" alt="Turistear Logo Registro">Tenes alguna duda? <br> 
                        <span class="text-lg font-thin">Completa el formulario y recibiremos tu consuta!</span> </h2>
                </div>
                <div class="m-7">
                    <form action="#" method="POST" autocomplete="off">
                        <div class="mb-6">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Nombre completo</label>
                            <input required value="{{ old('name') }}" placeholder="Nombre completo" type="text" name="name" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('Parece que falta que ingreses tu nombre')">
                        </div>
                        <div class="mb-6">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Email</label>
                            <input required value="{{ old('email') }}" placeholder="Email" type="email" name="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"   oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Parece que falta que ingreses tu email')">
                        </div>
                        <div class="mb-6">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Numero de telefono</label>
                            <input value="{{ old('phone') }}" id="phone" placeholder="+XXX-(XXX)-XXXXXX" type="text" name="phone" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        </div>
                        <div class="mb-6">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"> Mensaje</label>
                            <textarea required rows="5" name="message" placeholder="Tu Mensaje" class="resize-none w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('No tenias un mensaje para nosotros?')"></textarea>
                        </div>
                        <div class="mb-6">
                            <button type="submit" class="w-full px-3 py-4 text-white bg-gray-700 rounded-md focus:bg-indigo-600 focus:outline-none">Enviar Mensaje</button>
                        </div>
                        <p class="text-base text-center text-gray-400" id="result">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Photos Team -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto lg:w-5/6">
            <div class="xl:flex xl:items-center xL:-mx-4">
                <div class="xl:w-1/2 xl:mx-4">
                    <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Nuestro equipo</h1>

                    <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">
                        Somos dos alumnos cursando su último año de la carrera de Ingeniería Informática, de la Universidad del
                        Norte Santo Tomas de Aquino.
                        Este proyecto está diseñado como exposición para el proyecto final integrador. El cual consta de satisfacer las necesidades de clientes a nivel mundial.

                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
                    <div>
                        <img class="object-cover rounded-xl h-64 w-full"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Santiago Evangelista</h1>
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Full stack developer</p>
                    </div>

                    <div>
                        <img class="object-cover rounded-xl h-64 w-full"
                            src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Matias Nicolas Morales</h1>
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Graphic Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.0.7/imask.min.js" integrity="sha512-qCt/OTd55ilhuXLRNAp/G8uONXUrpFoDWsXDtyjV4wMbvh46dOEjvHZyWkvnffc6I2g/WHSKsaFUCm0RISxnzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var phoneMask = IMask(
        document.getElementById("phone"), {
            mask: "+{000}-(000)-0000000",
        }
    );
</script>
    
@endsection 