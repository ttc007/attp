<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    function index()
    {
        if(Auth::user()->role == 12) {
            $categories = Category::where('hierarchy', 'hql')->get();
        } else {
            $categories = Category::where('hierarchy', 'ward')->get();
        }
        return view('category.view',compact('categories'));
    }

    function edit($id)
    {
    	$categories = Category::all();
        return view('category.edit',compact('categories'));
    }

    function api_store(Request $request){
    	
    	if($request->category_id == 0)$category = Category::create([
    		'name' => $request->name,
    		'parent_id' => 1,
            'hierarchy' => $request->hierarchy
    	]);
    	else{
    		$category = Category::find($request->category_id);
    		$category->update([
	    		'name' => $request->name,
	    	]);
    	} 
    	return $category;
    }

    function api_get(Request $request){
    	$categories = Category::all();
    	foreach ($categories as $key => $value) {
    		$value->parent = 'Không';
    		$category = Category::find($value->parent_id);
    		if($category) $value->parent = $category->name;
    	}
    	return $categories;
    }

    function api_show($id){
    	$category = Category::find($id);
    	return $category;
    }

    function api_delete($id){
    	Category::find($id)->delete();
    	return 200;
    }
}
