<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    function index()
    {
        return view('test.view');
    }

    function api_store(Request $request){
        if($request->test_id==0){
        	$test = Test::create([
	    		'name'=>$request->name
	    	]);
        }else{
            $test = Test::find($request->test_id);
            $test->update([
                'name'=>$request->name
            ]);
        }
    	return $test;
    }

    function api_get(){
    	$tests = Test::all();
    	return $tests;
    }

    function api_delete(Request $request){
    	$villages = Test::find($request->id)->delete();
    	return 200;
    }

    function api_show($id){
        return Test::find($id);
    }
}
