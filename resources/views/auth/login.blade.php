 @extends('layouts.app')

 @section('content')
     <div class="min-h-screen bg-no-repeat bg-cover bg-center"
         style="background-image: url('https://cdn.pixabay.com/photo/2021/12/15/20/21/sea-6873335_960_720.jpg')">
         <div class="flex justify-end">
             <div class="bg-white min-h-screen w-1/2 flex justify-center items-center">
                 <div>
                     @if ($errors->any())
                         <div class="bg-gray-700 text-white text-2xl">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                     <form method="POST" action="{{ route('login') }}">
                         @csrf
                         <div>
                             <span class="text-sm text-gray-900">Inicia sesion para continuar</span>
                             <h1 class="text-2xl font-bold">Bienvenido de nuevo!</h1>
                         </div>
                         <div class="mt-5">
                             <label class="block text-md mb-2" for="email">Email</label>
                             <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none" type="email"
                                 name="email" placeholder="Email">
                         </div>
                         <div class="my-3">
                             <label class="block text-md mb-2" for="password">Contraseña</label>
                             <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none" type="password"
                                 name="password" placeholder="Contraseña">
                         </div>
                         <div class="flex justify-between">
                             <span class="underline decoration-blue-400 decoration-wavy decoration-2">Olvidaste tu contraseña?</span>
                         </div>
                         <div>
                             <button class="mt-4 mb-3 w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-md transition duration-100">Ingresar</button>
                         </div>
                     </form>
                     <p class="mt-8"> ¿Aun no tienes una cuenta? <span class="cursor-pointer text-sm text-blue-600">Unete ahora!</span></p>
                 </div>
             </div>
         </div>
     </div>
     </div>
 @endsection
