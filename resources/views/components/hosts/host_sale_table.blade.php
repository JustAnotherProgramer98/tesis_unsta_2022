<div class="w-full overflow-x-auto mt-8"> {{-- inicio tabla de experiencias --}}
    <table class="w-full bg-black">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Fecha de venta</th>
                <th class="px-4 py-3">Usuario comprador</th>
                <th class="px-4 py-3">Precio pagado</th>
                <th class="px-4 py-3">Experiencia pagada</th>
                <th class="px-4 py-3">Estado del pago</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse ($user->experiences as $experience)
                @forelse ($experience->sales as $sale)
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <p class="font-semibold capitalize">{{ $sale->created_at }}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold capitalize">{{ $sale->user->name.' '.$sale->user->surname  }}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold capitalize">$ {{ $sale->amount }}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold capitalize">{{ $sale->experience->title }}</p>
                    </td>
                    <td class="px-4 py-3">
                        @switch($sale->status)
                            @case(1)
                                <span class="cursor-default px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Aprobada</span>
                            @break
                        
                            @case(2)
                                <span class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">Pendiente de pago</span>    
                            @break
                            @default
                                <span class="cursor-default px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Desaprobada</span>    
                            
                        @endswitch
                    </td>
                </tr>
                @empty
                @endforelse
                @empty
                Sin ventas registradas
                @endforelse
            
        </tbody>
    </table>
    <br>
</div> {{-- fin tabla de experiencia --}}
