<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $experiences=$request->session()->get('cart');
    
        if ($experiences==null) return view('guest.cart_shop',compact(['experiences']));

        if(count($experiences)==1){
            if (Auth::id()==null) return redirect()->back()->with('error_not_logged', 'Debes iniciar sesion para comprar');   
            $total_ammount=$experiences[0]->number_puchage * $experiences[0]->price;
            $total_ammount=$total_ammount + round(($total_ammount * 0.2) / 10) * 10;
            //Mercado pago funcional
            SDK::setAccessToken(env('MERCADO_PAGO_PRIVATE'));
            $preference = new Preference();

            $item = new Item();
            $item->title = 'Compraras: '.$experiences[0]->title;
            // $item->title = 'Compraras: ';
            $item->quantity = 1;
            $item->unit_price = $total_ammount;
            $preference->items = array($item);
            $item->currency_id = "ARS";
            $preference->back_urls = array(
                "success" => route('sale.success'),
                "failure" => route('sale.failed'),
                "pending" => route('sale.waiting'),
            );
            $preference->auto_return = "approved"; 
            $preference->save();

            Sale::create(['experience_id'=> $experiences[0]->id,'buyer_id'=> Auth::id(),'amount'=> $total_ammount,'status'=> 0]);
        }else{
            if (Auth::id()==null) return redirect()->back()->with('error_not_logged', 'Debes iniciar sesion para comprar');   
              //Mercado pago funcional
              SDK::setAccessToken(env('MERCADO_PAGO_PRIVATE'));
            $array_items=[];
            foreach ($experiences as $experience) {
                $total_ammount=$experience->number_puchage * $experience->price;
                $total_ammount=$total_ammount + round(($total_ammount * 0.2) / 10) * 10;
                $item = new Item();
                $item->title = 'Compraras: '.$experience->title;
                // $item->title = 'Compraras: ';
                $item->quantity = 1;
                $item->unit_price = $total_ammount;
                $item->currency_id = "ARS";
                array_push($array_items,$item);
                Sale::create(['experience_id'=> $experience->id,'buyer_id'=> Auth::id(),'amount'=> $total_ammount,'status'=> 0]);
            }
            
          
            $preference = new Preference();

            
            $preference->items = $array_items;
            $preference->back_urls = array(
                "success" => route('sale.success'),
                "failure" => route('sale.failed'),
                "pending" => route('sale.waiting'),
            );
            $preference->auto_return = "approved"; 
            $preference->save();
        }

        return view('guest.cart_shop',compact(['experiences','preference']));
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
