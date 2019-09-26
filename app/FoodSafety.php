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

    public static function getCodeAuto($village_id, $category_id){
        $village = Village::find($village_id);
        $category = Category::find($category_id);
        $ward = Ward::find($village->parent_id);
        if($village != null){
            $fsIndex = 1;
            $lap = true;
            while($lap){
                if($fsIndex < 10) $inc = "00".$fsIndex;
                else if($fsIndex < 100) $inc = "0".$fsIndex;
                else $inc = $fsIndex;
                $code =  self::slugName(@$ward->name);
                $code .= "_".self::slugName(@$village->name);
                $code .= "_".self::slugName(@$category->name)."_".$inc;

                if(FoodSafety::where('code', $code)->count() == 0){
                    return $code;
                    $lap = false;
                } else {
                    $fsIndex++;
                }
            }
        }
        return "0000Error";
    }

    public static function slugName($string){
        if($string == "Hòa Phước") return "HP1";
        else if($string == "Hòa Phú") return "HP2";
        else if($string == "Hòa Phong") return "HP3";
        else if($string == "Hòa Ninh") return "HN1";
        else if($string == "Hòa Nhơn") return "HN2";
        else if($string == "Bếp ăn tập thể") return "BATT";
        else if($string == "Nhóm trẻ gia đình") return "NTGD";
        else if($string == "Thức ăn đường phố") return "TADP";
        else if($string == "Dịch vụ ăn uống") return "DVAU";
        else if($string == "Quán ăn xã quản lí") return "QAXQL";
        else if($string == "Quán ăn huyện quản lí") return "QAHQL";
        else if($string == "Nấu ăn lưu động") return "NALD";
        else {
            $result = "";
            $arr = explode(" ", $string);
            foreach ($arr as $value) {
                $char = substr($value, 0, 1);
                $result .= $char;
            }
            return strtoupper($result);
        }
    }
}
