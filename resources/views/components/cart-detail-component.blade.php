<table class="w-full text-sm lg:text-base" cellspacing="0">
    <thead>
        <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Experiencia</th>
            <th class="lg:text-right text-left pl-5 lg:pl-0">
                <span>Participantes</span>
            </th>
            <th class="hidden text-right md:table-cell">Precio</th>
            <th class="text-right">Precio Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total_ammount = 0;
        @endphp
        @forelse ($experiences as $experience)
            @php
                $total_ammount += $experience->number_puchage * $experience->price;
            @endphp
            <tr>
                <td class="hidden md:table-cell">
                    @if ($experience->images->first())
                        <img width="400px" height="400px" class="focus:outline-none rounded-lg"
                            src="{{ asset($experience->images->first()->url) }}"
                            alt="{{ $experience->images->first()->alt }}">
                    @else
                        <img width="400px" height="400px" class="focus:outline-none w-full h-44 rounded-3xl m-4"
                            src="{{ asset('images/Turistear.png') }}" alt="Logo por defecto">
                    @endif
                </td>
                <td>
                    <p class="text-paleta_tesis_celeste font-semibold">{{ $experience->title }}</p>
                    <small class="text-paleta_tesis_azul">Por :
                        {{ $experience->host->name . ' ' . $experience->host->surname }}</small>
                    <form action="{{ route('cart.delete') }}" id="remove_from_cart" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $loop->index }}" name="index">
                        
                        <button class="mt-2 text-gray-400 bg-transparent border-0 py-1 px-2  rounded"><i  class="mr-2 fas fa-trash-alt text-red-500"></i>Remover</button>
                    </form>
                </td>
                <td class="text-center">
                    <span class="text-sm lg:text-base font-medium">{{ $experience->number_puchage }}</span>
                </td>

                <td class="hidden text-right md:table-cell">
                    <span class="text-sm lg:text-base font-medium">$ {{ number_format($experience->price) }}</span>
                </td>
                <td class="text-right">
                    <span class="text-sm lg:text-base font-medium">$
                        {{ number_format($experience->number_puchage * $experience->price,2)  }} </span>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>


<hr class="pb-6 mt-6">
<div class="my-4 mt-6 -mx-2 lg:flex">
    <div class="lg:px-2 lg:w-1/2">
        <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">¿Tenes un cupon de descuento?</h1>
        </div>
        <div class="p-4">
            <p class="mb-4 ">Si tenes un cupon ingresalo y lo validaremos!</p>
            <div class="justify-center md:flex">
                <form id="coupon_use" action="{{ route('couppon.use') }}" method="POST">
                    @csrf
                    <div class="flex items-center w-full h-13 pl-3  bg-gray-100 rounded-full">
                        <input required oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('Parece que falta que ingreses el cupon')" type="coupon" name="coupon_code" id="coupon_code" placeholder="Aplicar cupon...." value="{{ old('coupon_code') }}" class="w-full bg-gray-100 " />
                        <button style="background-color: #112D4E" class="text-sm flex items-center px-3 py-1 text-white rounded-full outline-none md:px-4 hover:bg-paleta_tesis_celeste focus:outline-none active:outline-none">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z" />
                            </svg>
                            <span class="font-medium">Aplicar cupon</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="lg:px-2 lg:w-1/2">
        <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Detalle de compra</h1>
        </div>
        <div class="p-4">
            <div class="flex justify-between border-b">
                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Subtotal
                </div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">$
                    {{ number_format($total_ammount,2) }}</div>
            </div>
            @if (\Session::has('coupon_code'))            
            <div class="flex justify-between pt-4 border-b">
                <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">Codigo: "
                    {{Session::get('coupon_code')->first()->code}}"
                </div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700">
                    @if (Session::get('coupon_code')->first()->discount_percent == '100')
                    $ -{{$total_ammount}}    
                    @php
                        $total_ammount=0;
                    @endphp
                    @else
                    $ -{{ number_format((Session::get('coupon_code')->first()->discount_percent/100) *($total_ammount),2)}}
                    @endif
                </div>
            </div>
            @endif
            <div class="flex justify-between pt-4 border-b">
                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-paleta_tesis_azul">Comision turiste<span
                        style='color: #3F72AF'>AR</span></div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">$
                    
                    {{ number_format(round(($total_ammount * 0.2) / 10) * 10,2) }}</div>
            </div>
            <div class="flex justify-between pt-4 border-b">
                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Total
                </div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">$ {{ number_format($total_ammount + round(($total_ammount * 0.2) / 10) * 10,2) }}</div>
            </div>
                <div
                    class="flex justify-center w-full px-10 py-3 mt-6 font-medium rounded-full item-center">
                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                    </svg>
                        @if (Auth::user())
                            @if (Auth::user()->status==1)
                                <span class="ml-2 mt-5px"><div class="cho-container"></div></span>
                            @else
                                <button class="ml-4 rounded-md bg-paleta_tesis_azul" type="button" onclick="notAproved('not_aproved')">Pagar</button>
                            @endif
                            
                        @else
                            <button class="ml-4 rounded-md bg-paleta_tesis_azul" type="button" onclick="notAproved('not_loged_in')">Pagar?</button>
                        @endif
                </div>
        </div>
    </div>
</div>
