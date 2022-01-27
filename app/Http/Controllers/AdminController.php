<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Place;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            
            $users=User::all();
            $experiencies=Experience::all();
            $places=Place::all();
            $balance=0;
            $sales=Sale::all();
            foreach ($sales as $sale) {
                if ($sale->approved) {
                    $balance=$balance+$sale->amount;
                }
            }

            return view('admin.admin-panel',compact(['users','experiencies','balance','places']));
        }
        return view('welcome');
    }
}
