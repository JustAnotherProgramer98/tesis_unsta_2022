@extends('layouts.app')

@section('title_of_tab')
    <p class="text-purple-500 font-bold text-2xl">Cupones de descuento</p>
@endsection

@section('content')

    @include('admin.coupon_codes.show')

@endsection
