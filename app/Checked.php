<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CheckedTest;
use App\Test;

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
}
