<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Ward;
use Session;

class UserController extends Controller
{
    function index(){
    	$users = User::all();
    	$wards =Ward::all();
    	return view('user.view', compact('users','wards'));
    }

    function session_Ward_name(){
    	return @Ward::find(Session::get('ward_id'))->name;
    }

    function update_role($id,Request $request){
    	$user = User::find($id);
    	$user->update(['role'=>$request->role]);
    	return redirect()->back();
    }
}
