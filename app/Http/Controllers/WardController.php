<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;

class WardController extends Controller
{
    function index()
    {
        return view('ward.view');
    }

    function api_store(Request $request){
        if($request->ward_id==0)
    	$village = Ward::create([
    		'name'=>$request->name
    	]);
        else{
            $village = Ward::find($request->ward_id);
            $village->update([
                'name'=>$request->name
            ]);
        }
    	return $village;
    }

    function api_get(){
    	$villages = Ward::all();
    	return $villages;
    }

    function api_delete(Request $request){
    	$villages = Ward::find($request->id)->delete();
    	return 200;
    }

    function api_show($id){
        return Ward::find($id);
    }
}
