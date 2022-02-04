<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        
        $validated=$request->validate([
            'experience_id'=>'required|integer',
            'quantity_coupons'=>'required|numeric|digits_between:1,100',
            'percentaje_coupons'=>'required|numeric|digits_between:1,100'
        ]);
        
        try {
            DB::transaction(function () use ($validated){
                for ($i=0; $i != $validated['quantity_coupons']; $i++){
                    CouponCode::create(['code'=>bin2hex(random_bytes(6)),
                        'discount_percent'=>$validated['percentaje_coupons'],
                        'experience_id'=> Experience::where('id',$validated['experience_id'])->get()->first()->id
                    ]);
            
                }
            });
            return redirect()->route('coupons.index.admin');
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }


    public function show(CouponCode $couponCode)
    {
        //
    }


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
