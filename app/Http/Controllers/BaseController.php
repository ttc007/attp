<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;

class BaseController extends Controller
{
    public function __construct(){

    	$request = Request();
    	$workspace = explode('/', $request->fullUrl())[3];
    	View::share ( 'workspace', $workspace );
	}
}
