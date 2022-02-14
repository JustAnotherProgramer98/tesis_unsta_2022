@extends('layouts.guest')
@section('content')  

        <section>
            <!-- component -->
            <p class="text-center text-4xl font-semibold py-4"><br> Por Categorias o Lugar</p>
            <div tabindex="0" class="focus:outline-none">
                <!-- Remove py-8 -->
                <div class="mx-auto container py-8">
                    <div class="flex flex-wrap items-center lg:justify-between justify-center">
                        <!-- Card 1 -->
                        
                        @foreach ($experiences as $experience)
                        <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                            <div>
                                <img alt="person capturing an image" src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" tabindex="0" class="focus:outline-none w-full h-44" />
                            </div>
                            <div class="bg-white">
                                
                                <div class="p-4">
                                    <div class="flex items-center">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                            </svg>
                                        </div>
                                        <h2 tabindex="0" class="focus:outline-none text-lg font-semibold"> {{$experience->title}}</h2>
                                    </div>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{$experience->subtitle}}</p>
                                    
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
            <script src="chrome-extension://kgejglhpjiefppelpmljglcjbhoiplfn/shadydom.js"></script>
            <script>
                if (!window.ShadyDOM) window.ShadyDOM = { force: true, noPatch: true };
            </script>
        </section>
@endsection