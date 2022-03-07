<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {
        $users=User::latest()->paginate(8);
        return view('admin.users.index',compact(['users']));
    }

    public function indexHosts()
    {
        $users = User::whereRelation('role', 'name','Anfitrion' )->latest()->paginate(8);
        return view('admin.users.index',compact(['users']));

    }
    public function indexClients()
    {
        $users = User::whereRelation('role', 'name','Cliente' )->latest()->paginate(8);
        return view('admin.users.index',compact(['users']));

    }
    public function indexDeletedUsers()
    {
        $users=User::onlyTrashed()->latest()->paginate(8);
        return view('admin.users.softdeleted',compact(['users']));

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


    public function show(User $user)
    {
        return view('admin.users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $provinces=Province::with('cities')->get();
        return view('host.edit_users',compact(['user','provinces']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated=$request->validate([
            'name'=>'required|string',
            'surname'=>'required|string',
            'birthday'=>'required|date',
            'gender'=>'required|string',
            'phone'=>'required',
            'adress'=>'required',
            'email'=>'required',
            'password'=>'required',
            ],[
                'password.required'=>'Por motivos de seguridad debes ingresar tu contraseña para validar los cambios',
            ]);
        if ($validated['password']!=$request->password2 and $request->password2!=null) return redirect()->back()->withErrors('Las contraseñas no coinciden!'); 
        try {
            DB::transaction(function () use ($validated,$request,$user){
                $user->update($validated);

                if ($request->profile_image) foreach($user->images as $image_to_delete) $image_to_delete->delete(); 

                if ($request->profile_image) {
                    $image = new Image();
                    $request->profile_image->store('public');
                    $image->url=$request->profile_image->hashName();
                    $image->alt="Imagen de perfil";
                    $image->picturable_type=get_class($user);
                    $image->picturable_id=$user->id;
                    $image->save();    
                }                
            });
            Auth::login($user);
            return redirect()->back()->with('success', 'Datos actualizados!');    
        } catch (\Throwable $th) {
            throw $th;
        }
    
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $user=User::where('id',$request->user_id)->get()->first();
            if ($user == null) return  response()->json(['error' => 'No se pudo eliminar al usuario porque no fue encontrado']);
            if (count($user->experiences)!=0 and count($user->sales)!=0) return  response()->json(['error' => 'No se pudo eliminar al usuario porque posee experiencias o ventas aun']);
            MailController::host_notify_disaproved_user($user->name.' '.$user->surname,$user->email);
            return $user->delete();
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function approveUser(Request $request)
    {
        try {
            $user=User::where('id',$request->experience_id)->get()->first();
            if ($user->role->name == 'Anfitrion') {
                MailController::host_notify_aproved_user($user->name.' '.$user->surname,$user->email);
            } else {
                MailController::client_notify_aproved_user($user->name.' '.$user->surname,$user->email);
            }
            return $user->update(['status' => 1]);
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function search(Request $request)
    {
        # code...
    }

    public function forceDeleteUser(Request $request)
    {
        try {
            User::withTrashed()->where('id',$request->experience_id)->get()->first()->forceDelete();
            return redirect()->route('users.deleted.index.admin');

        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function restoreUser(Request $request)
    {
        try {
            User::withTrashed()->where('id',$request->experience_id)->get()->first()->restore();
            return redirect()->route('users.index.admin');
            
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
}
