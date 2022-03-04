@extends('layouts.guest')
@section('content')   
    <!-- component -->
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white pin-r pin-y md:w-4/5 lg:w-4/5">
    <div class="flex-1">
      @if (\Session::has('success'))
        <h4 class="pl-4 text-green-700 rounded-md bg-green-100 m-4 p-2 shadow-lg  text-2xl "><i class="pr-4 fas fa-check text-green-700 text-2xl"></i>{{Session::get('success')}}</h4>
      @endif
      @if($errors->any())
        <h4 class="pl-4 text-red-700 rounded-md bg-red-100 m-4 p-2 shadow-lg  text-2xl "><i class="pr-4 fas fa-times text-red-700 text-2xl"></i>{{$errors->first()}}</h4>
      @endif
      @if ($experiences)
        <x-cart-detail-component :experiences="$experiences"> </x-cart-detail-component>
      @else
      <div class="w-full md:w-7/12 mx-auto px-4 my-10 text-center">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-2xl rounded-lg">
          <div class="px-4 py-5 flex-auto">
            <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-paleta_tesis_celeste">
              <span class="inline-block  text-blue-500 dark:text-blue-400">
                <i class="fal fa-shopping-cart text-6xl text-paleta_tesis_blanco"></i>
              </span>
            </div>
            <h6 class="text-xl font-semibold">Nada por aqui , nada por alla</h6>
            <p class="mt-2 mb-4 text-gray-600">Aun no agregaste experiencias al carrito <br> <span class="text-2xl font-bold text-paleta_tesis_azul ">Animate a explorar todas las opciones!</span></p>
            
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>

<script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
    const mp = new MercadoPago("{{ env('MERCADO_PAGO_ACCESS_TOKEN') }}", {
        locale: 'es-AR'
    });

    mp.checkout({
      preference: {
                id: '{{ $preference->id ?? '' }}'
            },
        render: {
            container: '.cho-container',
            label: 'Pagar!',
            
        },
        theme: {
          elementsColor: "#81ecec" // Color claro
        }
    });
</script>
<script>
  
$("#coupon_use").submit(function(e) {
      if (@json(Auth::user()) === null) {
        e.preventDefault();

          Swal.fire({  
            title:'Error!',
            text: "Para usar un cupon debes estar registrado",
            imageUrl: "{{ asset('images/Turistear.png') }}",
            imageWidth: 200,
            imageHeight: 100,
            imageAlt: 'Turistear logo',
            confirmButtonText: 'Registrarse',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            background:'#F9F7F7',
            margin: '5em',
            confirmButtonColor: '#112D4E',
            width: 500,
          }).then(result => {
                if (result.value) {
                  window.location.href = "{{ route('register')}}";
                } // fin If
              });
        }
});
function notAproved(estado) {
  console.log(estado);
  if (estado=='not_aproved') {
    Swal.fire({  
    title:'Error!',
    text: "Para comprar debes ser un usuario aprobado por el Administrador del sitio",
    imageUrl: "{{ asset('images/Turistear.png') }}",
    imageWidth: 200,
    imageHeight: 100,
    imageAlt: 'Turistear logo',
    confirmButtonText: 'Aceptar',
    background:'#F9F7F7',
    margin: '5em',
    confirmButtonColor: '#112D4E',
    width: 500,
});
  } else {
    Swal.fire({  
    title:'Error!',
    text: "Para comprar debes tener un usuario en nuestra pagina",
    imageUrl: "{{ asset('images/Turistear.png') }}",
    imageWidth: 200,
    imageHeight: 100,
    imageAlt: 'Turistear logo',
    confirmButtonText: 'Aceptar',
    background:'#F9F7F7',
    margin: '5em',
    confirmButtonColor: '#112D4E',
    width: 500,
});
  }

  
}
</script>
@endsection 