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
            if(!$ward) $food_safety->delete();
            $village = Village::find($food_safety->village_id);
            $category = Category::find($food_safety->categoryb2_id);
            if($village != null && $category != null){
                $fsIndex = 1;
                $lap = true;
                while($lap){
                    if($fsIndex < 10) $inc = "00".$fsIndex;
                    else if($fsIndex < 100) $inc = "0".$fsIndex;
                    else $inc = $fsIndex;
                    $code =  $this->slugName($ward->name);
                    $code .= "_".$this->slugName($village->name);
                    $code .= "_".$this->slugName($category->name)."_".$inc;

                    if(FoodSafety::where('code', $code)->count() == 0){
                        $food_safety->update(['code' => $code]);
                        $lap = false;
                    } else {
                        $fsIndex++;
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
                    $checked_code .= "_".$this->slugName($ward->name);
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
        return redirect("food_safety/y-te");
    }

    function slugName($string){
        if($string == "Hòa Phước") return "HP1";
        else if($string == "Hòa Phú") return "HP2";
        else if($string == "Hòa Phong") return "HP3";
        else if($string == "Hòa Ninh") return "HN1";
        else if($string == "Hòa Nhơn") return "HN2";
        else if($string == "Bếp ăn tập thể") return "BATT";
        else if($string == "Nhóm trẻ gia đình") return "NTGD";
        else if($string == "Thức ăn đường phố") return "TADP";
        else if($string == "Dịch vụ ăn uống") return "DVAU";
        else if($string == "Quán ăn") return "QA";
        else {
            $result = "";
            $arr = explode(" ", $string);
            foreach ($arr as $value) {
                $result .= substr($value, 0, 1);
            }
            return strtoupper($this->slug_url($result));
        }
    }

    function slug_url( string $str ){

        //Kiểm tra xem dữ liệu truyền vào có phải là một chuỗi hay không
        if( is_string( $str ) ){
            // Chuyển đổi toàn bộ chuỗi sang chữ thường
            $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8"); 

            //Tạo mảng chứa key và chuỗi regex cần so sánh
            $unicode = [
                'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                'd' => 'đ',
                'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
                'i' => 'í|ì|ỉ|ĩ|ị',
                '-' => '\+|\*|\/|\&|\!| |\^|\%|\$|\#|\@',
            ];

            foreach ( $unicode as $key => $value )
            {
                //So sánh và thay thế bằng hàm preg_replace
                $str = preg_replace("/($value)/", $key, $str);
            }

            //Trả về kết quả
            return $str;
        } 
        return null;
    }
}
