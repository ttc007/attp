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
}
