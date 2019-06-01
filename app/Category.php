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
                $data[$child->name.$ward->name] = Food_safety::join("villages", "villages.id", "food_safeties.village_id")
                        ->where("categoryb2_id", $child->id)
                        ->where("villages.parent_id", $ward->id)
                        ->count();
            }
        }
        return $data;
    }
}
