<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
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
        //
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
            return User::where('id',$request->experience_id)->get()->first()->delete();
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function approveUser(Request $request)
    {
        try {
            return User::where('id',$request->experience_id)->get()->first()->update(['status' => 1]);
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
