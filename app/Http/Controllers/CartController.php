<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $experiences=$request->session()->get('cart');
        return view('guest.cart_shop',compact('experiences'));
    }

    public function store(Request $request)
    {
       $request->validate(['experience_id'=>'required']);
       
       try {
        if(empty($request->session()->get('cart'))){
            $experience=Experience::where('id',$request->experience_id)->get();
            $experience->first()->number_puchage = $request->quantity;

            $request->session()->put('cart', $experience);
        }
        else{
            $experience=Experience::where('id',$request->experience_id)->get()->first();
            $experience->number_puchage = $request->quantity;
            $request->session()->push('cart', $experience);
        }

        return response()->json(['status' => 'Experiencia agregada al carrito']);
   
       } catch (\Throwable $th) {
           return response()->json(['status' => 'Error al agregar experiencia al carrito, el error es '.$th]);
       }
       
    } 
    public function destroy(Request $request)
    {
        $experiences = Session::get('cart'); 
        unset($experiences[$request->index]);
        Session::put('cart', $experiences);


        return Redirect::back()->withErrors(['msg' => 'Experiencia quitada']);

    }
}
