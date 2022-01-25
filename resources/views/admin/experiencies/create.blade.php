@extends('layouts.app')

@section('content')

    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">


        <!-- Sidebar -->
            <x-admin-side-bar></x-admin-side-bar>
        <!-- ./Sidebar -->

        <div class="px-12 h-full ml-14 mt-14 mb-10 md:ml-64">
            
<!-- component -->
<div class="container items-center px-5 py-12 lg:px-20">
    <form class="flex flex-col p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform w-11/12  ">
      <section class="flex flex-col w-full h-full p-1 overflow-auto">
        <label for="name" class="text-base leading-7  mb-5">Imagen de la experiencia</label>
        <header class="flex flex-col items-center justify-center py-12 text-base  transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
          <input type="file" class="w-auto px-2 py-1 my-2 mr-2  transition duration-500 ease-in-out transform border rounded-md hover:text-blueGray-600 text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-gray-100"> Subir una imagen 
        </header>
      </section>
      <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Titulo de la Experiencia</label>
        <input placeholder="Titulo" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 "> 
      </div>
      <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Subtitulo de la Experiencia</label>
        <input placeholder="Subtitulo" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 "> 
      </div>
      <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Descripcion de la experiencia</label>
        <br>
        <small class="text-gray-500">*Puede envever HTML para que luego sea interpretado por el sitio</small>
        <textarea class="resize-none font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2" name="description"  cols="30" rows="10" placeholder="Descripcion de la experiencia"></textarea>
      </div>
      <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Ubicacion de la experiencia</label>
        <select name="place_id" class="text-gray-600 placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 "> 
            <option value="X" selected hidden>Selecciona una ubicacion</option>
        </select>
      </div>
      <div class="relative p-4">
        <label for="name" class="text-base leading-7 ">Input Range</label>
        <input type="range" id="range" name="range" placeholder="name" class="w-full px-0 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
      </div>
      <div class="relative mt-4">
        <label for="name" class="text-base leading-7 ">Component Select</label>
        <select class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
          <option>Surabaya</option>
          <option>Bandung</option>
          <option>jakarta</option>
        </select>
      </div>
      <div class="flex flex-wrap mt-4 mb-6 -mx-3">
        <div class="w-full px-3">
          <label class="text-base leading-7 " for="description">Text Area </label>
          <textarea class="w-full h-32 px-4 py-2 mt-2 text-base  transition duration-500 ease-in-out transform bg-white border rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 apearance-none autoexpand" id="description" type="text" name="description" placeholder="Message..." required=""></textarea>
        </div>
      </div>
      <div class="flex">
        <label class="flex items-center">
          <input type="checkbox" class="form-checkbox ">
          <span class="ml-2 ">checkbox </span>
        </label>
      </div>
      <div class="flex items-center w-full pt-4 mb-4">
        <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 "> Button </button>
      </div>
      <hr class="my-4 border-gray-200">
      <span class="px-4 py-1 mx-auto -mt-8 text-xs text-black transition duration-500 ease-in-out transform bg-gray-200 rounded-lg">Or continue with </span>
      <div class="inline-flex items-center justify-between w-full pt-8 ">
        <button class="w-auto px-8 py-2 mr-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 hover:bg-blueGray-200 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 focus:border-blueGray-700 focus:bg-blueGray-800 ">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
          </svg>
        </button>
        <button class="w-auto px-8 py-2 mr-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 hover:bg-blueGray-200 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 focus:border-blueGray-700 focus:bg-blueGray-800 ">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-gitlab" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M21 14l-9 7l-9 -7l3 -11l3 7h6l3 -7z"></path>
          </svg>
        </button>
        <button class="w-auto px-8 py-2 mr-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 hover:bg-blueGray-200 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 focus:border-blueGray-700 focus:bg-blueGray-800 ">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"></path>
          </svg>
        </button>
      </div>
    </form>
  </div>




        </div>
    </div>

@endsection
