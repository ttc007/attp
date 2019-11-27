<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\FoodSafety;
use App\Ward;
use App\User;

class Category extends Model
{
	// use Sluggable;

 //    public function sluggable()
 //    {
 //        return [
 //            'slug' => [
 //                'source' => 'name'
 //            ]
 //        ];
 //    }
    protected $guarded = [];

    function childs($ward_id){
        if($ward_id == '0') {
            return Self::where('parent_id',$this->id)->orderBy('sort')->get();
        }else if($ward_id == '12') {
            return Self::where('parent_id',$this->id)->where('hierarchy', 'hql')->orderBy('sort')->get();
        }
    	return Self::where('parent_id',$this->id)->where('hierarchy', 'ward')->orderBy('sort')->get();
    }

    function fsInChildOfCategory(){
        $childs = Self::where('parent_id',$this->id)->get();
        $data = [];
        foreach ($childs as $key => $child) {
            foreach (Ward::all() as $ward) {
                $data[$child->name.$ward->name] = FoodSafety::where("categoryb2_id", $child->id)
                        ->where('status','!=', 'Tạm nghỉ')
                        ->where("ward_id", $ward->id)
                        ->count();
            }
        }
        return $data;
    }

    function fsInChildOfCategoryWard($ward_id){
        $childs = $this->childs($ward_id);
        $data = [];
        foreach ($childs as $key => $child) {
            $data[$child->name] = FoodSafety::where("categoryb2_id", $child->id)
                        ->where('status','<>', 'Tạm nghỉ')
                        ->where("ward_id", $ward_id)
                        ->count();
        }
        return $data;
    }

    public static function autoSlug($string){
        $result = "";
        $arr = explode(" ", $string);
        foreach ($arr as $value) {
            $char = utf8_encode(substr($value, 0, 1));
            $result .= $char;
        }
       
        if(self::where('slug', $result)->count() == 0 ){
            return strtoupper($result);
        } else {
            $i = 1;
            $result1 = $result.$i;
            while (self::where('slug', $result1)->count() > 0) {
                $i ++;
                $result1 = $result.$i;
            }
            return strtoupper($result1);
        }
    }
}
