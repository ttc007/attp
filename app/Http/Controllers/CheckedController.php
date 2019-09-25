<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Checked;
use App\CheckedTest;
use App\Test;
use Carbon\Carbon;

class CheckedController extends Controller
{
    function store_checked(Request $request){
    	$date = Carbon::parse($request->dateChecked);
    	$data = [
    		'food_safety_id' => $request->food_safety_id,
			'result' => $request->result,
			'note' => $request->note,
			'penalize' => $request->penalize,
			'year' => $date->format('Y'),
			'month' => $date->format('m'),
			'day' => $date->format('d'),
            'dateChecked' => $request->dateChecked
    	];
        if($request->checked_id > 0){
        	$checked = Checked::find($request->checked_id);
        	$checked->update($data);
        } else {
        	$checked = Checked::create($data);
        }

        CheckedTest::where("checked_id", $checked->id)->delete();
        if($request->test){
        	foreach (explode("<br>", $request->test) as $key => $testSplit) {
        		$testName = explode(":", $testSplit)[0];
        		$testResult = explode(":", $testSplit)[1];
        		CheckedTest::create([
        			'checked_id' => $checked->id,
        			'test_id' => $testName,
        			'result' => $testResult
        		]);
        	}
        }

        return 200;
    }

    function remove($id){
        CheckedTest::where("checked_id", $id)->delete();
    	$checked = Checked::find($id)->delete();
    	return redirect()->back();
    }
}
