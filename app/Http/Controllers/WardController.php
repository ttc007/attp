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
        if($request->ward_id==0) {
            $ward = Ward::create([
                'name' => $request->name,
                'slug' => $request->slug
            ]);
        } else {
            $ward = Ward::find($request->ward_id);
            $ward->update([
                'name'=>$request->name,
                'slug' => $request->slug
            ]);
        }

    	return $ward;
    }

    function api_get(){
    	$wards = Ward::all();
    	return $wards;
    }

    function api_delete($id){
    	Ward::find($id)->delete();
    	return 200;
    }

    function api_show($id){
        return Ward::find($id);
    }
}
