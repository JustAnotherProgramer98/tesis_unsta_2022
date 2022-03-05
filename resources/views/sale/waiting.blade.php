@extends('layouts.guest')
@section('content')    
<body>
    
    
    <div class="w-full overflow-x-auto mt-8">
        <div class="mx-auto bg-white shadow-lg rounded-lg my-300 px-3 py-3 w-9/12 border">
            <div class="bg-white p-6  md:mx-auto">
                <div class="w-16 h-16 mx-auto my-6 animate-spin rounded-full border-8 border-blue-500 border-b-transparent"></div>
                
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Espera un momento por favor</h3>
                    <p class="text-gray-600 my-2">Estamos procesando tus datos.</p>
                    
                </div>
            </div>
        </div>
        <br>
    </div>
</body>



@endsection 