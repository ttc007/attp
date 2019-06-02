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
}
