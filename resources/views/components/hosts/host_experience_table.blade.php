<div class="w-full overflow-x-auto mt-8"> {{-- inicio tabla de experiencias --}}
    @if (count(Auth::user()->experiences) != 0)
        <table class="w-full bg-black">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nombre de la experiencia</th>
                    <th class="px-4 py-3">Cantidad de usuarios que la compraron</th>
                    <th class="px-4 py-3">Lugar</th>
                    <th class="px-4 py-3">Precio de la experiencia</th>
                    <th class="px-4 py-3">Categoria</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Editar</th>
                    <th class="px-4 py-3">Borrar</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse (Auth::user()->experiences as $experience)

                    <tr onclick="showExperience(event, 'show_experience_detail',{{ $experience }},'{{ $experience->images->first()? asset('storage/' . $experience->images->first()->url): addslashes('Sin imagenes') }}','{{ $experience->place->city->province->name }}','{{ $experience->place->city->name }}','{{ addslashes(Str::limit($experience->place->adress, 10)) }}')"
                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <p class="font-semibold capitalize">{{ $experience->title }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold capitalize">{{ count($experience->sales) }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold capitalize">
                                {{ Str::limit($experience->place->city->province->name, 10, '...') . ', ' . $experience->place->city->name }}
                            </p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold capitalize">$ {{ $experience->price }}</p>
                        </td>
                        <td class="px-4 py-3">
                            @forelse ($experience->categories as $category)
                                @if ($loop->last)
                                    <p class="font-semibold capitalize">{{ $category->title }} </p>
                                @else
                                    <p class="font-semibold capitalize">{{ $category->title }} - </p>
                                @endif
                            @empty
                                Experiencia sin categoria
                            @endforelse
                        </td>
                        <td class="px-8 py-3 whitespace-nowrap">
                            @switch($experience->status)
                                @case(0)
                                    <span
                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Inactiva
                                    </span>
                                @break
                                @case(1)
                                    <span
                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Activa
                                    </span>
                                @break
                                @default
                                    <span
                                        class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                        Esperando de aprobacion</span>
                            @endswitch
                        </td>
                        <td class="px-8 py-3 ">
                            <a href="{{ route('experiencies.edit.admin', $experience) }}">
                                <i class="fas fa-pencil-alt text-blue-500"></i>
                            </a>
                        </td>
                        <td class="px-8 py-3 ">
                            <i onclick="deleteUser(event,'{{ addslashes($experience->title) }}',{{ $experience->id }})"
                                class="fas fa-trash-alt text-red-500 cursor-pointer	"></i>
                        </td>
                    </tr>
                    @empty
                        Usuario sin experiencias
                    @endforelse
                </tbody>
            </table>
            <br>
        @else
        <p>Aun no tienes experiencias , animate a crear una!</p>
        @endif
</div> {{-- fin tabla de experiencia --}}
