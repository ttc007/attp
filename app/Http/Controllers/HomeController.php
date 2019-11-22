<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Ward;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()->role=="hql"){
            return redirect('/food_safety/reportMaster');
        }
        Session::put('ward_id',Auth::user()->role);
        return redirect('/food_safety/1');
    }

    public function admin_view_choose()
    {
        return view('admin_view_choose');
    }

    function view_ward_ss($id){
        Session::put('ward_id',$id);
        return redirect('/food_safety/y-te');
    }
}
