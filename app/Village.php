<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Village extends Model
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

    public static function autoSlug($string){
        $result = "";
        $arr = explode(" ", $string);
        foreach ($arr as $value) {
            $char = utf8_encode(substr($value, 0, 1));
            // $char = utf8_decode($char);
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
