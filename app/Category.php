<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Food_safety;
use App\Ward;

class Category extends Model
{
	use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $guarded = [];

    function childs(){
    	return Self::where('parent_id',$this->id)->get();
    }

    function fsInChildOfCategory(){
        $childs = Self::where('parent_id',$this->id)->get();
        $data = [];
        foreach ($childs as $key => $child) {
            foreach (Ward::all() as $ward) {
                $data[$child->name.$ward->name] = Food_safety::where("categoryb2_id", $child->id)
                        ->where('status','!=', 'Tạm nghỉ')
                        ->where("ward_id", $ward->id)
                        ->count();
            }
        }
        return $data;
    }

    function fsInChildOfCategoryWard($ward_id){
        $childs = Self::where('parent_id',$this->id)->get();
        $data = [];
        foreach ($childs as $key => $child) {
            $data[$child->name] = Food_safety::where("categoryb2_id", $child->id)
                        ->where('status','!=', 'Tạm nghỉ')
                        ->where("ward_id", $ward_id)
                        ->count();
        }
        return $data;
    }
}
