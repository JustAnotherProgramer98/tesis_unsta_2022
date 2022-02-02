<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostController extends Controller
{
public function index()
{
    if (!(Auth::user()->role->name == 'Administrador')) {
        return view('host.index',['user'=>Auth::user()]);
    }
}

}
