<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;

class WardController extends Controller
{
    function index()
    {
        $wards = Ward::all();
        return view('ward.view', compact('wards'));
    }

    function api_store(Request $request){
        if($request->ward_id==0)
    	$village = Ward::create([
    		'name' => $request->name,
            'slug' => Ward::autoSlug($request->name) 
    	]);
        else{
            $village = Ward::find($request->ward_id);
            $village->update([
                'name'=>$request->name,
                'slug' => Ward::autoSlug($request->name) 
            ]);
        }
    	return $village;
    }

    function api_get(){
    	$villages = Ward::all();
    	return $villages;
    }

    function api_delete($id){
    	$villages = Ward::find($id)->delete();
    	return 200;
    }

    function api_show($id){
        return Ward::find($id);
    }
}
