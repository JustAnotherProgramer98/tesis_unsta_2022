<div class="w-full overflow-x-auto mt-8"> {{-- inicio tabla de experiencias --}}
    @if (count(Auth::user()->sales) != 0)
        <table class="w-full bg-black">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="whitespace-nowrap px-4 py-3">Nombre de la experiencia</th>
                    <th class="whitespace-nowrap px-4 py-3">Anfitrion</th>
                    <th class="whitespace-nowrap px-4 py-3">Fecha de compra</th>
                    <th class="whitespace-nowrap px-4 py-3">Lugar</th>
                    <th class="whitespace-nowrap px-4 py-3">Precio pagado</th>
                    <th class="whitespace-nowrap px-4 py-3">Estado</th>
                    <th class="whitespace-nowrap px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse (Auth::user()->sales as $sale)
                        <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <p class="font-semibold capitalize cursor-pointer hover:underline hover:text-blue-400 ">{{ $sale->experience->title }}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold capitalize">{{ $sale->experience->host->name.' '.$sale->experience->host->surname }}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold capitalize ">{{ $sale->created_at->format('m/d/Y')}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold capitalize ">
                                    {{ Str::limit($sale->experience->place->city->province->name, 10, '...') . ', ' . $sale->experience->place->city->name }}
                                </p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold capitalize">$ {{ $sale->experience->price }}</p>
                            </td>
                            
                            <td class=" whitespace-nowrap">
                                @switch($sale->status)
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
                                        <span class="cursor-default px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">Esperando de aprobacion</span>
                                @endswitch
                            </td>
                            <td class="px-4 py-3">
                                @if ($sale->status==1 && $sale->finished==0)
                                    {{-- Boton de finalizar la experiencia --}}
                                    <button onclick="finishExperience(event,'{{ $sale->experience->title }}','{{ $sale->id }}')" style="background-color: #6495ed" type="button" class="px-2 py-1 font-semibold offset-2 leading-tight text-white bg-gradient-to-bl shadow-lg shadow-gray-400 rounded-full">Finalizar</button>
                                @elseif ($sale->finished==1 )
                                    @if ($sale->commented != 1)
                                        {{-- Experiencia sin comentar --}}
                                        <button onclick="commentExperience(event,'{{ $sale->experience->title }}','{{ $sale->experience->id }}','{{ $sale->id }}')" style="background-color: #1da184" type="button" class="px-2 py-1 font-semibold offset-2 leading-tight text-white bg-gradient-to-bl shadow-lg shadow-gray-400 rounded-full">Comentar</button>
                                        @else
                                        {{-- Experiencia ya comentada --}}
                                        <span class="cursor-default px-2 py-1 font-semibold leading-tight text-cyan-700 bg-cyan-100 rounded-full">Ya comentaste :) </span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                    Usuario sin interacciones    
                    @endforelse
                </tbody>
            </table>
            <br>
        @else
        <div class="w-full md:w-7/12 mx-auto px-4 my-10 text-center">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-2xl rounded-lg">
              <div class="px-4 py-5 flex-auto">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-max h-max mb-5 shadow-lg rounded-full bg-paleta_tesis_azul">
                  <span class="inline-block  text-blue-500 dark:text-blue-400">
                    <i class="fal fa-hands text-6xl text-paleta_tesis_blanco"></i>
                  </span>
                </div>
                <h6 class="text-xl font-semibold">1,2 y.... ¡nada!</h6>
                <p class="mt-2 mb-4 text-gray-600">Aun no compraste ninguna experiencia <br> <span class="text-2xl font-bold text-paleta_tesis_celeste ">Animate a explorar todas las opciones!</span></p>
                
              </div>
            </div>
          </div>
        @endif
</div> {{-- fin tabla de experiencia --}}

<script>
    function finishExperience(e, experience_name,sale_id) {
        e.preventDefault();
            Swal.fire({
                title: '¿Finalizar experiencia?',
                text: '¿Ya finalizaste la experiencia de: ' + experience_name + " ?",
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: "#5ec481",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Aprobar",
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('sale.aprove') }}",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        type: 'POST',
                        data: {
                            sale_id: sale_id
                        },
                        success: (result) => {
                            location.reload();
                            },
                        failure: (result) => alert(msg_error),
                    }); //fin Ajax
                } // fin If
            });
    };
    function commentExperience(e, experience_name,experience_id,sale_id) {
        $( "#experience_name_on_comment").text(experience_name);
        $("#comment_sale_id").val(sale_id);
        $("#comment_experience_id").val(experience_id);
        $("#comment_experience").show();
    }
</script>