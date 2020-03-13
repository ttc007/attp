<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CheckedTest;
use App\Test;
use App\Ward;
use App\FoodSafety;

class Checked extends Model
{
    protected $guarded = [];

    function getCheckedTests(){
    	$checkedTests = CheckedTest::where('checked_id', $this->id)->get();
    	foreach ($checkedTests as $key => $checkedTest) {
    		$checkedTest->test = Test::find($checkedTest->test_id);
    	}
    	return $checkedTests;
    }

    public static function getCodeAuto($food_safety_id, $year){
    	$food_safety = FoodSafety::find($food_safety_id);
        $ward = Ward::find($food_safety->ward_id);
        $lap = true;
        $cIndex = 1;
        while($lap){
            if($cIndex < 10) $inc = "000".$cIndex;
            else if($cIndex < 100) $inc = "00".$cIndex;
            else if($cIndex < 1000) $inc = "0".$cIndex;
            else $inc = $cIndex;

            $checked_code = "KT";
            $checked_code .= "_". $ward->slug;
            $checked_code .= "_".$year;
            $checked_code .= "_".$inc;

            if(Checked::where('code', $checked_code)->count() == 0){
                return $checked_code;
                $lap = false;
            } else {
                $cIndex++;
            }
        }
        return "0000Error";
    }
}
