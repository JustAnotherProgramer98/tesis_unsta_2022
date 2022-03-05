@extends('layouts.guest')
@section('content')    
<body>
    
    
    <div class="w-full overflow-x-auto mt-8">
        <div class="mx-auto bg-white shadow-lg rounded-lg my-300 px-3 py-3 w-9/12 border">
            <div class="bg-white p-6  md:mx-auto">
                <div class="w-20 h-20 mx-auto my-6 animate-pulse bg-yellow-500 text-black rounded-full border-8 text-center "> <p class="mt-4 text-2xl">!</p></div>
                
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">El pago esta en espera por parte de MercadoPago</h3>
                    <p class="text-gray-600 my-2">Estamos a la espera de su aprobacion para aceptar tu compra</p>
                </div>
                <div class="py-10 text-center">
                    <a href="{{ route('experiencies.index') }}" class="px-12 bg-paleta_tesis_celeste hover:bg-white hover:text-paleta_tesis_celeste hover:border hover:border-paleta_tesis_celeste text-white font-semibold py-3">Volver al inicio</a>
                </div>
            </div>
        </div>
        <br>
    </div>
</body>



@endsection 