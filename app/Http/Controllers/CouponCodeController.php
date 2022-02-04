<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use App\Models\Experience;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences_with_coupons=Experience::withCount('coupon_codes')->orderBy('coupon_codes_count', 'desc')->latest()->paginate(8);
        return view('admin.coupon_codes.index',compact(['experiences_with_coupons']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function show(CouponCode $couponCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponCode $couponCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponCode $couponCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $coupons=CouponCode::where('experience_id',$request->first_cupon_id)->get();
            foreach ($coupons as $coupon) {
                $coupon->delete();
            }
            return 'Sucess';
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
}
