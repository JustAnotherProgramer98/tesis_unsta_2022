<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            
            $sales=Sale::latest()->paginate(8);
            $users=User::all();
            $experiences=Experience::where('status',1)->get();
            return view('admin.sales.index',compact(['sales','experiences','users']));
        }
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
    public function store(Request $request,Experience $experience)
    {
        
        $experience_to_cart=Experience::where('id',$experience->id)->get();
        $experience_to_cart->first()->number_puchage = $request->quantity_clients;
        $request->session()->forget('cart');

        $request->session()->put('cart',$experience_to_cart);
        
        
         return redirect()->route('cart.index');
    
        // } catch (\Throwable $th) {
        //     return $th;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    
    public function aprove(Request $request)
    {
        try {
            return Sale::where('id',$request->sale_id)->get()->first()->update(['finished' => 1]);
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }

}
