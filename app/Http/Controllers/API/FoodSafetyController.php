<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FoodSafety;
use App\Category;
use App\Checked;
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
        $food_safeties = $food_safeties->get();
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
            $value->checkeds = $value->getCheckeds();
        }
        return $food_safeties;
    }
}
