<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Village;
use App\Checked;
use App\Category;
use App\CheckedTest;
use App\Test;


class FoodSafety extends Model
{
	protected $table = 'food_safeties';
    protected $guarded = [];

    public function getVillage(){
    	return Village::find($this->village_id);
    }

    public function getCheckeds(){
    	$checkeds = Checked::where('food_safety_id',$this->id)->get();
    	foreach ($checkeds as $key => $checked) {
    		$checked->checked_tests =  CheckedTest::where('checked_id', $checked->id)->get();
    	}
    	return $checkeds;
    }

    public function getCategory2(){
    	return Category::find($this->categoryb2_id);
    }

    public static function getCodeAuto($ward_id, $village_id, $category_id){
        $village = Village::find($village_id);
        $category = Category::find($category_id);
        $ward = Ward::find($ward_id);

        $fsIndex = 1;
        $lap = true;
        while($lap && $fsIndex < 1000){
            $code = (@$ward->slug);
            $code .= "_". ($village?$village->slug:'?');
            $code .= "_". ($category?$category->slug:'?') ."_" . $fsIndex;

            if(FoodSafety::where('code', $code)->count() == 0){
                return $code;
                $lap = false;
            } else {
                $fsIndex++;
            }
        }

        return "0000Error???";
    }
}
