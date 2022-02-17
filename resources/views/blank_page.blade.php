@extends('layouts.app')

@section('title_of_tab')
    <p class="text-paleta_tesis_celeste font-bold text-2xl">Cupones de descuento</p>
@endsection

@section('content')

    @include('admin.coupon_codes.show')

@endsection
