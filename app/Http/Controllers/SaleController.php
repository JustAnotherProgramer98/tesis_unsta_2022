<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Experience;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return view('admin.sales.show',compact(['sale']));
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

    public function comment_experiencie(Request $request)
    {
        $validated=$request->validate([
            'experience_id'=>'required|integer',
            'comment'=>'required|string',
            'stars_number'=>'required|integer',
            'sale_id'=>'required|integer',
            
        ]);
        
        try {
            DB::transaction(function () use ($validated) {
                $comment=Comment::create([
                    'body'=>$validated['comment'],
                    'user_id'=>Auth::id(),
                    'experience_id'=>$validated['experience_id'],
                    'stars'=>$validated['stars_number'],
                    
                ]);
                Sale::find($validated['sale_id'])->update(['commented'=>1]);
            });
            $sale=Sale::where('id',$validated['sale_id'])->get()->first();
            
            $comment=Comment::where('user_id',Auth::id())->where('stars',$validated['stars_number'])->where('body',$validated['comment'])->where('experience_id',$validated['experience_id'])->get()->first();
            MailController::client_notify_comment(Auth::user()->email);
            MailController::host_notify_commented($sale->experience->host->email,$sale->experience->host->name.' '.$sale->experience->host->surname,
            Auth::user()->name.' '.Auth::user()->surname,$sale->experience->title,$comment->body);
            return redirect()->back()->with('commented', 'Gracias por tu comentario , notificaremos al anfitrion de tu experiencia!');    
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function aprove(Request $request)
    {
        try {
            $sale=Sale::where('id',$request->sale_id)->get()->first();
            MailController::client_reminder_comment(Auth::user()->email,
            Auth::user()->name.' '.Auth::user()->surname,$sale->experience->host->name.' '.$sale->experience->host->surname,
            $sale->experience->host->email,$sale->experience->title,
            'Argentina - '.$sale->experience->place->city->province->name.' - '.$sale->experience->place->city->name.' - '.$sale->experience->place->adress);

            MailController::host_notify_payment($sale->experience->host->name.' '.$sale->experience->host->surname,$sale->experience->host->email);
            return $sale->update(['finished' => 1]);
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }

    public function sale_success(Request $request)
    {
        $last_sale = Sale::where('buyer_id', Auth::id())->orderByDesc('id')->first();
        $request->session()->forget('cart');
        DB::transaction(function () use ($last_sale) { $last_sale->update(['status'=>1]);});

        MailController::host_notify_sale($last_sale->user->name.' '.$last_sale->user->surname,
        $last_sale->user->email,$last_sale->user->phone,$last_sale->created_at,$last_sale->experience->title,
        number_format($last_sale->amount-round(($last_sale->amount * 0.2) / 10) * 10,2));

        MailController::admin_notify_sale($last_sale->user->name.' '.$last_sale->user->surname,$last_sale->user->email,
        $last_sale->created_at,$last_sale->amount,$last_sale->experience->host->name.' '.$last_sale->experience->host->surname,
        $last_sale->experience->host->email,$last_sale->experience->title);

        MailController::client_notify_sale($last_sale->user->email,$last_sale->id,$last_sale->created_at,$last_sale->experience->title,
        number_format($last_sale->amount-round(($last_sale->amount * 0.2) / 10) * 10,2),$last_sale->experience->place->city->province->name.' '.$last_sale->experience->place->city->name.' '.$last_sale->experience->place->adress);
        
        return view('sale.success');
    }
    public function sale_failed(Request $request)
    {
        $last_sale = Sale::where('buyer_id', Auth::id())->orderByDesc('id')->first();
        $request->session()->forget('cart');
        DB::transaction(function () use ($last_sale) { $last_sale->update(['status'=>0]);});
        return view('sale.failed');
    }
    public function sale_waiting(Request $request)
    {
        $last_sale = Sale::where('buyer_id', Auth::id())->orderByDesc('id')->first();
        $request->session()->forget('cart');
        DB::transaction(function () use ($last_sale) { $last_sale->update(['status'=>2]);});
        return view('sale.waiting');
    }

}
