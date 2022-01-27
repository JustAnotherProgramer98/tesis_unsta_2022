<table id="custom_search" class="w-full">
    <thead>
        <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3 whitespace-nowrap">Compra #nro</th>
            <th class="px-4 py-3 whitespace-nowrap">Experiencia comprada</th>
            <th class="px-4 py-3 whitespace-nowrap">Anfitrion de la experiencia</th>
            <th class="px-4 py-3 whitespace-nowrap">Comprador</th>
            <th class="px-4 py-3 whitespace-nowrap">Estado de la compra</th>
            <th class="px-4 py-3">Borrar</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @forelse ($sales as $sale)
            <tr
                class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <a href="{{ route('experiencie.show.admin', $sale) }}">
                        <p class="font-semibold capitalize">{{ $sale->id }}</p>
                    </a>
                </td>
                <td class="px-4 py-3">
                    <a href="{{ route('experiencie.show.admin', $sale) }}">
                        <p class="font-semibold capitalize">{{ $sale->experience->title }}</p>
                    </a>
                </td>
                <td class="px-4 py-3">
                    <a href="{{ route('experiencie.show.admin', $sale) }}">
                        <p class="font-semibold capitalize">{{ $sale->experience->host->name }}</p>
                    </a>
                </td>
                <td class="px-4 py-3">
                    <a href="{{ route('experiencie.show.admin', $sale) }}">
                        <p class="font-semibold capitalize">{{ $sale->user->name }} </p>
                    </a>
                </td>
                <td class="px-4 py-3">
                    @switch($sale->status)
                        @case(0)
                            <span
                                class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Cancelada
                            </span>
                        @break
                        @case(1)
                            <span
                                class="cursor-default px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Aprobada
                            </span>
                        @break
                        @default
                            <span
                                class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                Pendiente de pago</span>
                    @endswitch
                </td>
                <td class="px-8 py-3 "><i
                        onclick="deleteUser(event,'{{ addslashes($sale->title) }}',{{ $sale->id }})"
                        class="fas fa-trash-alt text-red-500 cursor-pointer	"></i></td>
            </tr>
            @empty
                <tr>No hay ventas en la base de datos</tr>
            @endforelse

        </tbody>
    </table>
    <br>
