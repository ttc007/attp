<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;
use Auth;

class VillageController extends Controller
{
    function index()
    {
        $villages = Village::where('parent_id', Auth::user()->role)->get();
        return view('village.view', compact('villages'));
    }

    function api_store(Request $request){
        if($request->village_id==0)
    	$village = Village::create([
    		'name' => $request->name,
            'parent_id' => $request->ward_id,
            'slug' => Village::autoSlug($request->name) 
    	]);
        else{
            $village = Village::find($request->village_id);
            $village->update([
                'name'=>$request->name,
                'slug' => Village::autoSlug($request->name) 
            ]);
        }
    	return $village;
    }

    function api_get(Request $request){
    	$villages = Village::where('parent_id',$request->ward_id)->get();
    	return $villages;
    }

    function api_delete(Request $request){
    	$villages = Village::find($request->id)->delete();
    	return 200;
    }

    function api_show($id){
        return Village::find($id);
    }
}
