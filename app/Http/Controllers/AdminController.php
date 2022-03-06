<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Place;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            
            $users=User::all();
            $experiences=Experience::all();
            $contacts=DB::table('contacts')->get();
            $balance=0;
            $best_users_names=User::withCount('sales')->orderBy('sales_count', 'desc')->get()->take(5)->pluck('name'); 
            $best_users_surnames=User::withCount('sales')->orderBy('sales_count', 'desc')->get()->take(5)->pluck('surname'); 
            $best_users_sales=User::withCount('sales')->orderBy('sales_count', 'desc')->get()->take(5)->pluck('sales_count'); 
            $host_count=count(User::whereRelation('role', 'name','Anfitrion' )->get());
            $count_clients=count(User::whereRelation('role', 'name','Cliente' )->get());
            $count_admins=count(User::whereRelation('role', 'name','Admin' )->get());
            $sales=Sale::all();
            foreach ($sales as $sale) {
                if ($sale->status) {
                    $balance=$balance+$sale->amount;
                }
            }
            return view('admin.admin-panel',compact(['users','experiences','balance','contacts','host_count','count_clients','count_admins','best_users_names','best_users_sales','best_users_surnames']));
        }
        return view('welcome');
    }
}
