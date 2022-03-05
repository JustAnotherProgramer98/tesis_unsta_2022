@extends('layouts.guest')
@section('content')    
<body>
    <div class="w-full overflow-x-auto mt-8">
        <div class="mx-auto bg-white shadow-lg rounded-lg my-300 px-3 py-3 w-9/12 border">
            <div class="bg-white p-6  md:mx-auto">
                
                <svg class="w-16 h-16 mx-auto my-6 text-red-900 mr-2"
                            xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24"
                            stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Oops!!</h3>
                    <p class="text-gray-600 my-2">Tu Compra No Se Pudo Concretar</p>
                    <p> ¡Prueba con otro metodo o contacta con servicios al cliente!  </p>
                    <div class="py-10 text-center">
                        <a href="#" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                            ATRAS 
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</body>



@endsection 