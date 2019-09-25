<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FoodSafety;
use App\Category;
use App\Checked;
use App\CheckedTest;
use App\Test;
use DB;
use Carbon\Carbon;

class FoodSafetyController extends Controller
{
    function api_get(Request $request){
        $food_safeties = FoodSafety::where('food_safeties.category_id',$request->category_id)
                        ->where('ward_id',$request->ward_id);
        if($request->categoryb2_id){
            $food_safeties = $food_safeties->where('categoryb2_id',$request->categoryb2_id);
        }
        if($request->village_id){
            $food_safeties = $food_safeties->where('village_id',$request->village_id);
        }
        $food_safeties = $food_safeties->orderBy('code', 'asc')->get();
        foreach ($food_safeties as $key => $value) {
            if($value->certification_date){
                $certification_date = Carbon::parse($value->certification_date)->addYears(3)->addDays(7);
                if($certification_date<Carbon::now()) 
                    $value->certification_date = "<b class='text-danger'>".Carbon::parse($value->certification_date)->format('d-m-Y')."</b>";
                else $value->certification_date = Carbon::parse($value->certification_date)->format('d-m-Y');
            }
            

            if($value->ngay_kham_suc_khoe!=""){
                $ngay_kham_suc_khoe = Carbon::parse($value->ngay_kham_suc_khoe)->addYears(1)->addDays(7);
                if($ngay_kham_suc_khoe<Carbon::now()) 
                $value->ngay_kham_suc_khoe = "<b class='text-danger'>".Carbon::parse($value->ngay_kham_suc_khoe)->format('d-m-Y')."</b>";
                else $value->ngay_kham_suc_khoe = Carbon::parse($value->ngay_kham_suc_khoe)->format('d-m-Y');
            }

            if($value->ngay_ky_cam_ket!=""){
                $ngay_ky_cam_ket = Carbon::parse($value->ngay_ky_cam_ket)->addYears(3)->addDays(7);
                if($ngay_ky_cam_ket<Carbon::now()) 
                $value->ngay_ky_cam_ket = "<b class='text-danger'>".Carbon::parse($value->ngay_ky_cam_ket)->format('d-m-Y')."</b>";
                else $value->ngay_ky_cam_ket = Carbon::parse($value->ngay_ky_cam_ket)->format('d-m-Y');
            }
            $value->village = $value->getVillage();
            $value->category_2 = $value->getCategory2();
            $checkeds = Checked::where('food_safety_id', $value->id)
                        ->where('year', $request->year)->get();
            foreach ($checkeds as $key => $checked) {
                $checked->checked_tests = CheckedTest::where('checked_id', $checked->id)->get();
                foreach ($checked->checked_tests as $key => $checked_test) {
                    $checked_test->test = Test::find($checked_test->test_id);
                }
            }
            $value->checkeds = $checkeds;
        }
        return $food_safeties;
    }

    function api_show($id, Request $request){
        $food_safety = FoodSafety::find($id);
        $checkeds = Checked::where('food_safety_id', $id)
                        ->where('year', $request->year)->get();
        foreach ($checkeds as $key => $checked) {
            $checked->checked_tests = CheckedTest::where('checked_id', $checked->id)->get();
            foreach ($checked->checked_tests as $key => $checked_test) {
                $checked_test->test = Test::find($checked_test->test_id);
            }
        }
        
        $food_safety->checkeds = $checkeds;
        return $food_safety;
    }

    function api_get_filter(Request $request){
        $food_safeties = FoodSafety::where('food_safeties.category_id',$request->category_id)
                        ->where('ward_id',$request->ward_id);
        $food_safeties->get();
        foreach ($food_safeties as $key => $value) {
            $value->village = @Village::find($value->village_id)->name;
            $certification_date = Carbon::parse($value->certification_date)->addYears(3)->addDays(7);
            if($certification_date<Carbon::now()) 
            $value->certification_date = "<b class='text-danger'>".Carbon::parse($value->certification_date)->format('d-m-Y')."</b>";
            else $value->certification_date = Carbon::parse($value->certification_date)->format('d-m-Y');

            if($value->ngay_kham_suc_khoe!=""){
                $ngay_kham_suc_khoe = Carbon::parse($value->ngay_kham_suc_khoe)->addYears(1)->addDays(7);
                if($ngay_kham_suc_khoe<Carbon::now()) 
                $value->ngay_kham_suc_khoe = "<b class='text-danger'>".Carbon::parse($value->ngay_kham_suc_khoe)->format('d-m-Y')."</b>";
                else $value->ngay_kham_suc_khoe = Carbon::parse($value->ngay_kham_suc_khoe)->format('d-m-Y');
            }

            if($value->ngay_ky_cam_ket!=""){
                $ngay_ky_cam_ket = Carbon::parse($value->ngay_ky_cam_ket)->addYears(3)->addDays(7);
                if($ngay_ky_cam_ket<Carbon::now()) 
                $value->ngay_ky_cam_ket = "<b class='text-danger'>".Carbon::parse($value->ngay_ky_cam_ket)->format('d-m-Y')."</b>";
                else $value->ngay_ky_cam_ket = Carbon::parse($value->ngay_ky_cam_ket)->format('d-m-Y');
            }
            
            if($value->ngay_xac_nhan_hien_thuc!=null)
            $value->ngay_xac_nhan_hien_thuc = Carbon::parse($value->ngay_xac_nhan_hien_thuc)->format('d-m-Y');

            if($value->ngay_kiem_tra_2!=null)
            $value->ngay_kiem_tra_2 = Carbon::parse($value->ngay_kiem_tra_2)->format('d-m-Y');

            if($value->ngay_kiem_tra_3!=null)
            $value->ngay_kiem_tra_3 = Carbon::parse($value->ngay_kiem_tra_3)->format('d-m-Y');

            $value->category_2 = @Category::find($value->categoryb2_id)->name;
            
            $checkeds = Checked::where('food_safety_id', $value->id)
                        ->where('year', $request->year)->get();
            foreach ($checkeds as $key => $checked) {
                $checked->checked_tests = CheckedTest::where('checked_id', $checked->id)->get();
                foreach ($checked->checked_tests as $key => $checked_test) {
                    $checked_test->test = Test::find($checked_test->test_id);
                }
            }
            $value->checkeds = $checkeds;
        }
        return $food_safeties;
    }

}
