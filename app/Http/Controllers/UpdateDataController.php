<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DateChecked;
use App\Checked;
use App\CheckedTest;
use App\Test;
use Carbon\Carbon;

class UpdateDataController extends Controller
{
    function updateDB(Request $request){
    	$dateCheckeds = DateChecked::all();
    	foreach ($dateCheckeds as $key => $dateChecked) {
    		if($dateChecked->ngay_xac_nhan_hien_thuc){
                if($dateChecked->ket_qua_kiem_tra_1!="Đạt") $dateChecked->ket_qua_kiem_tra_1 = 'Chưa đạt';
    			$date1 = Carbon::parse($dateChecked->ngay_xac_nhan_hien_thuc);
    			$checked = Checked::create([
    				'food_safety_id' => $dateChecked->food_safety_id,
    				'result' => $dateChecked->ket_qua_kiem_tra_1,
    				'note' => $dateChecked->ghi_chu_1,
    				'penalize' => $dateChecked->hinh_thuc_xu_phat_1,
    				'year' => $date1->format('Y'),
    				'month' => $date1->format('m'),
    				'day' => $date1->format('d'),
                    'dateChecked' => $dateChecked->ngay_xac_nhan_hien_thuc
    			]);
    			if($dateChecked->test_1){
    				$testArr = explode("<br>", $dateChecked->test_1);
    				foreach ($testArr as $testSplit) {
    					$testSplitArr = explode(":", $testSplit);
    					if(count($testSplitArr)>1){
    						$nameTest = $testSplitArr[0];
    						$resultTest = $testSplitArr[1];
    					}
    					if($nameTest!="Chọn 1 loại test"&&$resultTest!='Không kiểm tra'){
    						$test = Test::where('name', $nameTest)->first();
    						$checkedTest = CheckedTest::create([
    							'checked_id' => $checked->id,
    							'test_id' => $test->id,
    							'result' => $resultTest
    						]);
    					}
    				}
    			}
    		}
    		if($dateChecked->ngay_kiem_tra_2){
                if($dateChecked->ket_qua_kiem_tra_2!="Đạt") $dateChecked->ket_qua_kiem_tra_2 = 'Chưa đạt';
    			$date2 = Carbon::parse($dateChecked->ngay_kiem_tra_2);
    			$checked = Checked::create([
    				'food_safety_id' => $dateChecked->food_safety_id,
    				'result' => $dateChecked->ket_qua_kiem_tra_2,
    				'note' => $dateChecked->ghi_chu_2,
    				'penalize' => $dateChecked->hinh_thuc_xu_phat_2,
    				'year' => $date2->format('Y'),
    				'month' => $date2->format('m'),
    				'day' => $date2->format('d'),
                    'dateChecked' => $dateChecked->ngay_kiem_tra_2
    			]);
    			if($dateChecked->test_2){
    				$testArr = explode("<br>", $dateChecked->test_2);
    				foreach ($testArr as $testSplit) {
    					$testSplitArr = explode(":", $testSplit);
    					if(count($testSplitArr)>1){
    						$nameTest = $testSplitArr[0];
    						$resultTest = $testSplitArr[1];
    					}
    					if($nameTest!="Chọn 1 loại test"&&$resultTest!='Không kiểm tra'){
    						$test = Test::where('name', $nameTest)->first();
    						$checkedTest = CheckedTest::create([
    							'checked_id' => $checked->id,
    							'test_id' => $test->id,
    							'result' => $resultTest
    						]);
    					}
    				}
    			}
    		}
    		if($dateChecked->ngay_kiem_tra_3){
                if($dateChecked->ket_qua_kiem_tra_3!="Đạt") $dateChecked->ket_qua_kiem_tra_3 = 'Chưa đạt';
    			$date2 = Carbon::parse($dateChecked->ngay_kiem_tra_3);
    			$checked = Checked::create([
    				'food_safety_id' => $dateChecked->food_safety_id,
    				'result' => $dateChecked->ket_qua_kiem_tra_3,
    				'note' => $dateChecked->ghi_chu_3,
    				'penalize' => $dateChecked->hinh_thuc_xu_phat_3,
    				'year' => $date2->format('Y'),
    				'month' => $date2->format('m'),
    				'day' => $date2->format('d'),
                    'dateChecked' => $dateChecked->ngay_kiem_tra_3
    			]);
    			if($dateChecked->test_3){
    				$testArr = explode("<br>", $dateChecked->test_3);
    				foreach ($testArr as $testSplit) {
    					$testSplitArr = explode(":", $testSplit);
    					if(count($testSplitArr)>1){
    						$nameTest = $testSplitArr[0];
    						$resultTest = $testSplitArr[1];
    					}
    					if($nameTest!="Chọn 1 loại test"&&$resultTest!='Không kiểm tra'){
    						$test = Test::where('name', $nameTest)->first();
    						$checkedTest = CheckedTest::create([
    							'checked_id' => $checked->id,
    							'test_id' => $test->id,
    							'result' => $resultTest
    						]);
    					}
    				}
    			}
    		}
    	}
    
        return redirect("/");
    }
}
