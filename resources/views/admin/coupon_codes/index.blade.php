@extends('layouts.app')

@section('title_of_tab')
    <p class="text-paleta_tesis_celeste font-bold text-2xl">Cupones de descuento</p>
@endsection

@section('content')
    <div class="flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        <div>
            <!-- Client Table -->
            <div id="index" class="tabcontent mt-4 mx-4 block">
                <div class="flex gap-4 mb-4">
                    <div class="relative w-1/2">
                        <input type="text" class="w-full p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Buscar experiencia..." />
                        <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button style="margin-top: auto;margin-bottom: auto" onclick="openNewTab(event, 'create')"
                    class="mb-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Crear cupones</button>
                        <button style="margin-top: auto;margin-bottom: auto" id="button-popover" class="rounded-full border-2 border-blue-500 shadow-lg h-8 w-8" aria-describedby="tooltip">?</button>
                        <div id="tooltip" role="tooltip"> Hace click en las primeras 3 columnas y mira el detalle de los cupones
                            <div id="arrow" data-popper-arrow></div>
                        </div>
                </div>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Experiencia nombre</th>
                                    <th class="px-4 py-3 text-center">Cantidad de cupones</th>
                                    <th class="px-4 py-3 text-center">Cupones usados</th>
                                    <th class="px-4 py-3 text-center">Coupones sin usar</th>
                                    <th class="px-4 py-3">Borrar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($experiences_with_coupons as $experience_coupon)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 cursor-pointer">
                                            @php
                                                $array_of_coupons=[];
                                                foreach ($experience_coupon->coupon_codes as $coupon) {
                                                    array_push($array_of_coupons,$coupon->code);
                                                }
                                            @endphp
                                            <p onclick='openCouponDetail(event, "show","{{$experience_coupon->title}}",<?php echo json_encode($array_of_coupons);?> )' class="font-semibold">{{ $experience_coupon->title }}</p>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer text-center">
                                            <p class="font-semibold">{{ $experience_coupon->coupon_codes_count }}</p>
                                        </td>
                                        <td class="px-4 py-3  cursor-pointer text-center">
                                            <p class="font-semibold {{ count($experience_coupon->coupon_codes->where('status','1')) > 0 ? 'text-green-500' : '' }} ">{{ count($experience_coupon->coupon_codes->where('status','1')) }}</p>
                                        </td>
                                        <td class="px-4 py-3 cursor-pointer text-center">
                                            <p class="font-semibold">{{ count($experience_coupon->coupon_codes->where('status','0')) }}</p>
                                        </td>
                                        <td class="px-8 py-3 ">
                                            @if ($experience_coupon->coupon_codes->first())
                                                <i onclick="deletePlace(event,'{{ addslashes($experience_coupon->title) }}',{{ $experience_coupon->id }})" class="fas fa-trash-alt text-red-500 cursor-pointer	"></i>
                                            @endif
                                        </td> 
                                    </tr>
                                    @empty
                                        <tr>No hay cupones en la base de datos</tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <br>
                            {{ $experiences_with_coupons->links() }}
                        </div>
                    </div>
                </div>
                <x-create-cupons-form :experiences="$experiences_with_coupons"></x-create-cupons-form>
                @include('admin.coupon_codes.show')
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
function deletePlace(e, experience_name, first_cupon_id){
    e.preventDefault();

    Swal.fire({
        title: 'Borrar lugar',
        text: '¿Estas seguro que quieres borrar los cupones de la experiencia '+experience_name+'?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: "#1e40af",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Borrar",
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: "{{ route('coupons.destroy.admin') }}",
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),},
                type: 'DELETE',
                data: {first_cupon_id: first_cupon_id},
                success: (result) => {
                    location.reload();
                },
                failure: (result) => alert(msg_error),
            }); //fin Ajax
        } // fin If
    });
};

function openCouponDetail(event, tab_name,model,coupons) {

    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab_name).style.display = "block";
    event.currentTarget.className += " active";



    document.getElementById("container_popover_buttons").innerHTML='';    
    console.log("largo del array "+coupons.length);

    let loop=0;
    for (let index = 0; index != coupons.length ; index++) {
    popover_button=`
        <div style="width: max-content" x-data="{open: false}"  class="items-center justify-between">
            <div style="border-top-left-radius: 10px;border-bottom-right-radius: 10px;left: 70px;top:20px" x-cloak class="flex-shrink-0 pr-2 bg-paleta_tesis_gris  z-20 relative">
                <div x-show="open"  @mouseleave="open = false" x-transition class="" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1 z-50">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <p class="text-paleta_tesis_azul block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Sin usar</p>
                </div>
                </div>
            </div>
            <div class="z-10 flex-1 w-fit border border-gray-400 rounded-xl text-sm truncate m-3"  @mouseover="open = true" >
            <p id=Cuppon_code[${loop}] class="p-3 text-gray-500 w-full font-bold">Codigo de cupon</p>
            </div>
        </div>`

        console.log("valor de loop "+loop);
        console.log("entrada");
        document.getElementById("container_popover_buttons").innerHTML+=popover_button;
        loop++;
        document.getElementById("Cuppon_code["+index+"]").innerHTML=coupons[index];
       
    }
    
    
    document.getElementById("experience_name").innerHTML=model;
    
}
        </script>
    @endsection