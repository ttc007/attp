<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Village;

class Ward extends Model
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

    function village_id_array(){
        $villages = Village::where('parent_id', $this->id)->pluck('id')->toArray();
        return $villages;
    }

    public static function autoSlug($string){
        $result = "";
        $arr = explode(" ", $string);
        foreach ($arr as $value) {
            $char = substr($value, 0, 1);
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
