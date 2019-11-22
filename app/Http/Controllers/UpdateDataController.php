<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DateChecked;
use App\Checked;
use App\CheckedTest;
use App\Test;
use Carbon\Carbon;
use App\FoodSafety;
use App\Category;
use App\Village;
use App\Ward;

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

    function updateFSCode(){
        $food_safeties = FoodSafety::all();
        foreach ($food_safeties as $key => $food_safety) {
            $dataUpdate = [
                'ngay_ky_cam_ket' => $food_safety->certification_date?$food_safety->certification_date:null,
                'certification_date' => $food_safety->ngay_ky_cam_ket?$food_safety->ngay_ky_cam_ket:null
            ];
            $food_safety->update($dataUpdate);

            $ward = Ward::find($food_safety->ward_id);
            if(!$ward){
                $food_safety->delete();
            } else {
                $village = Village::find($food_safety->village_id);
                $category = Category::find($food_safety->categoryb2_id);
                if($village != null){
                    $fsIndex = 1;
                    $lap = true;
                    while($lap){
                        if($fsIndex < 10) $inc = "00".$fsIndex;
                        else if($fsIndex < 100) $inc = "0".$fsIndex;
                        else $inc = $fsIndex;
                        $code =  @$ward->slug;
                        $code .= "_".@$village->slug;
                        $code .= "_".@$category->slug."_".$inc;

                        if(FoodSafety::where('code', $code)->count() == 0){
                            $food_safety->update(['code' => $code]);
                            $lap = false;
                        } else {
                            $fsIndex++;
                        }
                    }
                }
            }
        }

        foreach (Checked::all() as $key => $checked) {
            
            $food_safety = FoodSafety::find($checked->food_safety_id);
            
            if(!$food_safety) $checked->delete();
            else{
                $ward = Ward::find($food_safety->ward_id);
                $lap = true;
                $cIndex = 1;
                while($lap){
                    if($cIndex < 10) $inc = "000".$cIndex;
                    else if($cIndex < 100) $inc = "00".$cIndex;
                    else if($cIndex < 1000) $inc = "0".$cIndex;
                    else $inc = $cIndex;

                    $checked_code = "KT";
                    $checked_code .= "_".$ward->slug;
                    $checked_code .= "_".$checked->year;
                    $checked_code .= "_".$inc;

                    if(Checked::where('code', $checked_code)->count() == 0){
                        $checked->update(['code' => $checked_code]);
                        $lap = false;
                    } else {
                        $cIndex++;
                    }
                }
            }
        }
        return redirect("food_safety/1");
    }

    function updateSlug(){
        $wards = Ward::all();
        foreach ($wards as $key => $ward) {
            $ward->update(['slug' => Ward::autoSlug($ward->name)]);
        }

        $villages = Village::all();
        foreach ($villages as $key => $village) {
            $village->update(['slug' => Village::autoSlug($village->name)]);
        }

        $categories = Category::all();
        foreach ($categories as $key => $category) {
            $category->update(['slug' => Category::autoSlug($category->name)]);
        }

        return redirect("food_safety/1");
    }
}
