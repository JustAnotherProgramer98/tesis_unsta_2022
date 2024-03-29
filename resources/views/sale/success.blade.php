@extends('layouts.guest')
@section('content')
    <!-- component -->
    <div class="w-full overflow-x-auto mt-8">
        <div class="mx-auto bg-white shadow-lg rounded-lg my-300 px-3 py-3 w-9/12 border">
            <div class="bg-white p-6  md:mx-auto">
                <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">¡Compra Realizada!</h3>
                    <p class="text-gray-600 my-2">Gracias por completar su pago seguro en línea.</p>
                    <p> ¡Que tengas un gran dia! </p>
                    <div class="py-10 text-center">
                        <a href="{{ route('experiencies.index') }}" class="px-12 bg-paleta_tesis_celeste hover:bg-white hover:text-paleta_tesis_celeste hover:border hover:border-paleta_tesis_celeste text-white font-semibold py-3">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
