@extends('layouts.app')

@section('content')

<div
class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
    
        <!-- Sidebar -->
            <x-admin-side-bar></x-admin-side-bar>
        <!-- ./Sidebar -->
        
        <div class="px-12 h-full ml-14 mt-14 mb-10 md:ml-64">
            <!-- Client Table -->
            <div class="mt-4 mx-4">
                <h1>Tabla de experiencias</h1>
                <hr class="border-1 border-slate-600">
                <br>
                <br>
                <button  class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear experiencia</button>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Titulo</th>
                                    <th class="px-4 py-3">Anfitrion</th>
                                    <th class="px-4 py-3">Lugar</th>
                                    <th class="px-4 py-3">Estado de la experiencia</th>
                                    <th class="px-4 py-3">Validar</th>
                                    <th class="px-4 py-3">Editar</th>
                                    <th class="px-4 py-3">Borrar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($experiences as $experiencie)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <p class="font-semibold capitalize">{{ $experiencie->title }}</p>
                                        </td>
                                        <td class="px-4 py-3">
                                            <p class="font-semibold capitalize">{{ $experiencie->host->name }}</p>
                                        </td>
                                        <td class="px-4 py-3">
                                            <p class="font-semibold capitalize">{{ $experiencie->place->province }} -
                                                {{ $experiencie->place->city }}</p>
                                        </td>
                                        <td class="px-4 py-3">
                                            @switch($experiencie->status)
                                                @case(0)
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Inactiva
                                                    </span>
                                                @break
                                                @case(1)
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Activa
                                                    </span>
                                                @break
                                                @default
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                                        Pendiente de aprovacion</span>
                                            @endswitch
                                        </td>
                                        @if ($experiencie->status != 1)
                                            <td class="px-4 py-3"><i class="fas fa-check text-green-500"></i></td>
                                        @endif
                                        <td class="px-4 py-3"><i class="fas fa-pencil-alt text-blue-500"></i></td>
                                        <td class="px-4 py-3"><i class="fas fa-trash-alt text-red-500"></i></td>
                                    </tr>
                                    @empty
                                        <tr>No hay experiencias en la base de datos</tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <br>
                            {{ $experiences->links() }}
                        </div>
                    </div>
                </div>




            </div>
        </div>

    @endsection
