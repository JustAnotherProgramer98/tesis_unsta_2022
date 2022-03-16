@extends('layouts.guest')
@section('content')  

        <section>
            <!-- component -->
            <p class="text-center text-4xl font-semibold py-4"><br> Experiencias encontradas</p>
            @if (count($experiences) >0)
                <div tabindex="0" class="focus:outline-none">
                    <!-- Remove py-8 -->
                    <div class="mx-auto container py-8">
                        <div class="flex flex-wrap gap-3 items-center  justify-center">
                            <!-- Card 1 -->
                            
                            @foreach ($experiences as $experience)
                            <div class="mx-2 w-96 xl:mb-0 mb-8 shadow-2xl transition ease-in-out duration-110  hover:-translate-y-1 hover:scale-110">
                                <a href="{{ route('guest.product',$experience) }}">
                                    <div>
                                        @if ($experience->images->first())
                                            <img  class="h-[20rem] w-full m-4 mx-auto rounded-t-lg " src="{{asset('storage/'.$experience->images->first()->url)}}" alt="{{ $experience->images->first()->alt }}">
                                        @else
                                            <img  class="h-[20rem] w-full rounded-t-lg  m-4 mx-auto" src="{{asset('images/Turistear.png')}}" alt="">                                
                                        @endif 
                                    </div>
                                </a>
                                <div class="bg-paleta_tesis_blanco">
                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <h2 tabindex="0" class="focus:outline-none text-lg font-semibold"> {{$experience->title}}</h2>
                                        </div>
                                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{Str::limit($experience->description, 20, '...') }}</p>
                                        
                                        <div class="flex items-center justify-between py-4">
                                            <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">
                                                {{ $experience->place->city->name }} - {{$experience->place->city->province->name}}
                                            </h2>
                                            <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>    <!-- Card 1 Ends -->
                    </div>
                </div>
            @else
            <div class="w-full md:w-4/12 mx-auto px-4 my-10 text-center">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                  <div class="px-4 py-5 flex-auto">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-paleta_tesis_azul">
                      <span class="inline-block  text-blue-500 dark:text-blue-400">
                        <i class="fal fa-bomb text-6xl text-paleta_tesis_blanco"></i>
                      </span>
                    </div>
                    <h6 class="text-xl font-semibold">Nada por aqui , nada por alla</h6>
                    <p class="mt-2 mb-4 text-gray-600">
                            Parece que no hay experiencias que cumplan tus criterios de busqueda 
                    </p>
                  </div>
                </div>
              </div>
            @endif
        </section>
@endsection