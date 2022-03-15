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
use Illuminate\Support\Facades\Hash;

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
                $user=User::create($request->all()+
                ['password'=>Hash::make($request['password']),'role_id'=>$request['type_account'],'status'=>2,'address'=>$request['adress'],
                'city'=>$city->name,'province'=>$city->province->name,
                'country'=>$city->province->country->name,'cuit'=>$request['cuit'] ? $request['cuit'] : 'No definido' ]);

                $user->update(['password'=>Hash::make($request['password'])]);

                if($request['type_account']==3){
                    $request['imagen_dni'][0]->store('public');
                    $user->dni_picture=$request['imagen_dni'][0]->hashName();
                    $user->save();
                }
                Auth::login($user);

                //Send email to new User
                MailController::register_email($user->name.' '.$user->surname,$user->email,$user->created_at,$user->role->name);
            });
            // $admin = User::whereRelation('role', 'name','Admin' )->get()->first();
            //Send email to Admin
            // MailController::send_mail($validated['fullname'],$validated['email'],$validated['phone'],$validated['message']);
            //Insertar plantilla del usarui que se acaba de registrar

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

        $numerber_of_reviews = $one_star_review = $two_star_review = $three_star_review= $four_star_review = $five_star_review =0;
        $numerber_of_reviews=$numerber_of_reviews+count($experience->sales);
        
        foreach ($experience->comments as $comment) {
                switch ($comment->stars) {
                    case (1):
                    $one_star_review++;
                        break;
                    case (2):
                    $two_star_review++;
                        break;
                    case (3):
                    $three_star_review++;
                        break;
                    case (4):
                    $four_star_review++;
                        break;
                    case (5):
                    $five_star_review++;
                        break;
                    default:
                        break;
                }
        }
        if ($numerber_of_reviews == 0) {
            $numer_of_starts=(($one_star_review*1)+($two_star_review*2)+($three_star_review*3)+($four_star_review*4)+($five_star_review*5));
        } else {
            $sum_stars=($one_star_review*1)+($two_star_review*2)+($three_star_review*3)+($four_star_review*4)+($five_star_review*5);
            $numer_of_starts=round($sum_stars/$numerber_of_reviews);
        }
        
        
        return view('guest.experience_detail', compact(['experiences', 'experience','numer_of_starts']));
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
            MailController::send_mail($validated['fullname'],$validated['email'],$validated['phone'],$validated['message']);
            return response()->json(['status' => 'El mensaje fue enviado correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Error al enviar el mensaje , el error es '.$th]);
        }

    }  
}