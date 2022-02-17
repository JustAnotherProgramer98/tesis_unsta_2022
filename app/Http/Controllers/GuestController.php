<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Place;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::where('status',1)->get();
        $places = Place::where('status',1)->get();
        $experiences = Experience::where('status',1)->take(5)->get();
        return view('guest.shop',compact(['experiences','categories','places']));
        
    }
    public function create()
    {
        $provinces=Province::with('cities')->get();
        return view('guest.register', compact(["provinces"]));
    }
    public function store(RegisterRequest $request)
    {
        
        try {
            DB::transaction(function () use ($request){
                $city=City::find($request['city_id']);
                $user=User::create($request->all()+['role_id'=>$request['type_account'],'status'=>2,
                'address'=>$request['adress'],'city'=>$city->name,'province'=>$city->province->name,'country'=>$city->province->country->name]);
                Auth::login($user);

            });
            if (Auth::user()->role_id==3) return redirect()->route('experiencies.index')->with('host', 'Tu cuenta sera verificada por el administrador y te notificaremos cualquier novedad a tu correo');
            return redirect()->route('experiencies.index')->with('status', 'Profile updated!');

        }
        catch (\Throwable $th) {
            return $th;
        }
        
    }
    public function showExperience(Experience $experience)
    {
        $experiences = Experience::where('status',1)->where('id','!=',$experience->id)->take(5)->get()->unique();
        return view('guest.experience_detail', compact(['experiences', 'experience']));
    }
    public function createContact()
    {
        return view('guest.contact_us');
    }
    public function storeContact(Request $request)
    {
        $validated=$request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        try {
            Contact::create($validated+['browser'=>$request->header('User-Agent')]);
            return response()->json(['status' => 'El mensaje fue enviado correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Error al enviar el mensaje , el error es '.$th]);
        }

    }
    
}