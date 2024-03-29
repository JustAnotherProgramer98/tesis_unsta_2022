@extends('layouts.guest')
@section('content')   
<main class="my-8">
    @if (\Session::has('error_not_logged'))
        <h4 class="pl-4 text-red-700 rounded-md bg-red-100 m-4 p-2 shadow-lg  text-2xl "><i class="pr-4 fas fa-times text-red-700 text-2xl"></i>{{Session::get('error_not_logged')}}</h4>
    @endif
    <div>
        <div class="container mx-auto md:flex md:items-center px-6">
            @if (count($experience->images) >0)
            <div class="md:flex-1 px-4">
                <div x-data="{ image: 1 }" x-cloak>
                    <div class="h-64 md:h-80 rounded-lg bg-transparent mb-4">
                        @forelse ($experience->images->take(4) as $image)
                            <div x-show="image ==={{$loop->iteration}}" style="background: center;background-size: contain;background-repeat: no-repeat;background-image: url('{{asset($image->url)}}')" class="h-64 md:h-80 rounded-lg bg-transparent mx-auto mb-4 flex items-center justify-center"></div>
                        @empty
                        @endforelse
                    </div>

                  
                    <div class="flex -mx-2 mb-4">
                        @forelse ($experience->images->take(4) as $image)
                        <div class="flex-1 px-2">
                            <button x-on:click="image = {{$loop->iteration}}" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === {{$loop->iteration}} }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-400 flex items-center justify-center" style="background: center;background-repeat: no-repeat;background-size: contain;background-image: url('{{asset($image->url)}}')"></button>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                
            </div>
            @else
            <div class="md:flex-1 px-4">
                    <div class="h-64 md:h-80 rounded-lg bg-paleta_tesis_blanco mb-4">
                        <div style="background: center;background-size: contain;background-repeat: no-repeat;background-image: url('{{asset('images/Turistear.png')}}')" class="relative h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <p class="absolute bottom-2 bg-paleta_tesis_azul text-white w-full text-center">Experiencia sin imagen</p>
                        </div>
                        
                    </div>
            </div>

            @endif

            <div class="md:flex-1 px-4">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"> @foreach ($experience->categories as $category) {{ $category->title }}  @endforeach </h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $experience->title }}</h1>
                <h2 class="mt-4 text-gray-800 text-2xl font-bold my-2">Anfitrion: <a class="text-paleta_tesis_celeste rounded-md p-2 font-thin hover:text-paleta_tesis_azul" href="{{ route('user.detail',$experience->host) }}">{{ $experience->host->name.' '.$experience->host->surname }}</a></h2>
                
                <div class="flex mb-4">
                    <span class="flex items-center">
                        @switch($numer_of_starts)
                        @case(0)
                        <div class='flex'>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        @break
                        @case(1)
                        <div class='flex'>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        @break
                        @case(2)
                        <div class='flex'>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        @break
                        @case(3)
                        <div class='flex'>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        @break
                        @case(4)
                        <div class='flex'>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        @break
                        @case(5)<div class='flex'>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current text-paleta_tesis_celeste" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        @break
                        
                        @default
                        
                     @endswitch
                        <span class="text-gray-600 ml-3">{{ count($experience->comments) > 0 ? count($experience->comments).' reseñas' : 'La experiencia aun no tiene reseñas , animate a ser el primero!' }} </span>
                    </span>
                </div>
                <div class="flex items-center">
                    <i class="fab fa-whatsapp text-xl text-green-700"></i>
                    <a id="wpp_link" target="_blank" href="https://api.whatsapp.com/send?text=Hola,%20vi%20esta%20experiencia%20en%20Turistear:%20{{$experience->title}}%20que%20se%20realiza%20con%20{{$experience->host->name.' '.$experience->host->surname}}%20y%20no%20pude%20resistirme%20a%20compartirtela%20%0a %0a">
                        <span class="ml-2">Compartir via whatsapp</span>
                    </a>
                </div>
                <h2 class="mt-4 text-gray-800 text-2xl font-bold my-2">Descripción: <h3 class="mt-4 text-gray-800 text-2xl my-2">{{Str::limit( $experience->description, 100, '...') }}</h3></h2>
                
                <button onclick="open_description_modal()" class="ml-auto font-semibold text-paleta_tesis_blanco bg-gradient-to-br from-blue-500 via-paleta_tesis_celeste to-blue-300 border-0 py-2 px-6 rounded">Más sobre la experiencia</button>
                
                <form action="{{ route('cart.buy',$experience) }}" method="POST">
                @csrf
                <div class="sm:grid sm:grid-flow-row sm:auto-rows-max md:flex md:flex-col mt-6 items-start pb-5 border-b-2 border-gray-200 mb-5">
                    <div class="flex  items-center">
                        <span class="mr-3">Cantidad de personas</span>
                        <div class="relative">
                            <select id="quantity_clients" name="quantity_clients" class="w-32 rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                 @for ($i=1;$experience->quantity_clients != $i;$i++)<option value="{{ $i }}">{{ $i }}</option>@endfor
                                
                            </select>
                            
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-flow-col sm:auto-rows md:flex">
                    <span class="title-font font-medium text-2xl text-gray-900">Precio: ${{number_format($experience->price,2)}}</span>
                    <button class="flex mx-auto md:ml-12 md:mr-0 md:h-10 md:my-0 my-4  text-paleta_tesis_blanco bg-paleta_tesis_azul border-0 py-2 px-6 focus:outline-none hover:bg-paleta_tesis_celeste rounded">Comprar</button>
                    <button id="add_to_cart" class="flex lg:whitespace-nowrap md:h-10 md:ml-3 md:mt-0 mt-4 mx-auto text-paleta_tesis_gris bg-paleta_tesis_celeste border-0 py-2 px-6 focus:outline-none hover:bg-paleta_tesis_azul rounded">Agregar al carrito</button>
                </div>
            </form>
            </div>
        </div>
        



        <div style="width: 100% !important" class="mt-16">
            <h3 class="ml-4 text-paleta_tesis_gris text-2xl font-medium border-b border-b-paleta_tesis_azul">Más experiencias <span class="text-paleta_tesis_azul"> que recomendamos</span> </h3>
            
            <div class="sm:grid sm:grid-flow-row sm:auto-rows-max lg:flex lg:flex-row mt-4  gap-8 place-content-center bg-gradient-to-b from-paleta_tesis_gris via-paleta_tesis_blanco overflow-x-hidden">
                @foreach ($experiences as $experience_related)
                <div class="focus:outline-none mx-2 w-full md:w-96 xl:mb-0 m-6 shadow-2xl gap-4">
                    <a href="{{ route('guest.product',$experience_related) }}">
                        <div class="mx-auto">
                            @if ($experience_related->images->first())
                                <img class="h-[10rem] w-full mx-auto rounded-t-lg" src="{{asset($experience_related->images->first()->url)}}" alt="{{ $experience_related->images->first()->alt }}">
                                @else
                                <img class="h-[10rem] w-full mx-auto rounded-t-lg" src="{{asset('images/Turistear.png')}}" alt="Logo por defecto">
                            @endif
                            
                        </div>
                    </a>
                    <div class="relative bg-paleta_tesis_blanco w-full md:w-full p-4 ">
                        <div class=" ">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{$experience_related->title}}</h2>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{Str::limit($experience_related->description, 20, '...') }}</p>
                            
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">
                                    {{ $experience_related->place->city->name }} - {{$experience_related->place->city->province->name}}
                                </h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
         
    </div>
</main>
@include('components.guests.modal_description')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>


<script>
    $("#add_to_cart").one( "click", function(e) {
        e.preventDefault();
        let quantity = $("#quantity_clients option:selected").val();
        let experience_id = @json($experience->id);
        if (@json(Auth::user()!=null)) {
            

            $.ajax({
                url: "{{ route('cart.post') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                data:{
                    experience_id:experience_id,
                    quantity:quantity,
                    _token: "{{ csrf_token() }}",
                },
                success: function(result) {
                    
                    Swal.fire({  
                      text: result.status,
                      imageUrl: "{{ asset('images/Turistear.png') }}",
                      imageWidth: 300,
                      imageHeight: 100,
                      imageAlt: 'Turistear logo',
                      confirmButtonText: 'Aceptar',
                      background:'#F9F7F7',
                      margin: '5em',
                      confirmButtonColor: '#112D4E',
                      width: 600,
                        }).then(result => {
                            if (result.value) {
                                location.reload();
                            } // fin If
                        });
                },
                failure: function (result){
                    Swal.fire({  
                      text: result.status,
                      imageUrl: "{{ asset('images/Turistear.png') }}",
                      imageWidth: 300,
                      imageHeight: 100,
                      imageAlt: 'Turistear logo',
                      confirmButtonText: 'Adelante!',
                      background:'#F9F7F7',
                      margin: '5em',
                      confirmButtonColor: '#112D4E',
                      width: 600,
                    })
                    
                }
            });
            return false;
        }else{
            Swal.fire({  
                    title:'Houston tenemos un problema...',
                    text: 'Debes iniciar sesion para comprar',
                    imageUrl: "{{ asset('images/Turistear.png') }}",
                    imageWidth: 300,
                    imageHeight: 100,
                    imageAlt: 'Turistear logo',
                    confirmButtonText: 'Entendido',
                    background:'#F9F7F7',
                    margin: '5em',
                    confirmButtonColor: '#112D4E',
                    width: 600,
                })
        }

        });
        var wpp_href = $("#wpp_link").attr("href");
        $("#wpp_link").attr("href", wpp_href + window.location.href);

        function open_description_modal(experience_description) {
        experience_description=@json(addslashes($experience->description));
        $( "#description_comment").text(experience_description);
        $("#experience_description").show();
            
        }
        
</script>
@endsection