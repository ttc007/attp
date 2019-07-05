<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food_safety;
use App\Category;
use App\Ward;
use App\Test;

class ReportController extends Controller
{
    function month_report($month,Request $request){
    	$category = Category::where('slug','y-te')->first();

    	$data = [];
    	$foodSafetyDateCheckeds = Food_safety::join('date_checked',
                                'date_checked.food_safety_id', 'food_safeties.id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.category_id', $category->id)
                                ->where('food_safeties.ward_id', $request->ward_id)
                                ->where('date_checked.year', $request->year)
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["fsInChildOfCategory"] = $category->fsInChildOfCategoryWard($request->ward_id);
        $data["categories"] = $category->childs();
    	return $data;
    }

    function month_report_master($month,Request $request){
        $category = Category::where('slug','y-te')->first();
        $data2 = [];
        
        $foodSafetyDateCheckeds = Food_safety::join('date_checked',
                                'date_checked.food_safety_id', 'food_safeties.id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.category_id', $category->id)
                                ->where('date_checked.year', $request->year)
                                ->get();
        $data2["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data2["fsInChildOfCategory"] = $category->fsInChildOfCategory();
        $data2["wards"] = Ward::all();
        $data2["categories"] = $category->childs();
        return $data2;
    }

    function reportByDate(Request $request){
        $category = Category::where('slug','y-te')->first();

        $data = [];
        foreach (Ward::all() as $key => $ward) {
            $data1 = [];
            foreach ($category->childs() as $key => $value) {
                $food_safetys_count = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','>=',$request->startDate)
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','<=' ,$request->endDate)
                        ->count();
                $food_safetys_count2 = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ngay_kiem_tra_2','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_2','<=', $request->endDate)
                        ->count();
                $food_safetys_count3 = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ngay_kiem_tra_3','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_3','<=', $request->endDate)
                        ->count();
                $food_safetys_count_pass = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ket_qua_kiem_tra_1', 'Đạt')
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','>=',$request->startDate)
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','<=', $request->endDate)
                        ->count();
                $food_safetys_count2_pass = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                        ->where('date_checked.ngay_kiem_tra_2','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_2','<=', $request->endDate)
                        ->count();
                $food_safetys_count3_pass = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                        ->where('date_checked.ngay_kiem_tra_3','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_3','<=', $request->endDate)
                        ->count();
                
                $count = $food_safetys_count+$food_safetys_count2+$food_safetys_count3;
                $countPass = $food_safetys_count_pass+$food_safetys_count2_pass
                    +$food_safetys_count3_pass;
                $rating = "0";
                if($count>0) $rating = round($countPass/$count*100, 2);
                
                $data1[$value->name] = $count."/".$countPass."/".$rating."%";
            }
            $data['wards'][$ward->name] = $data1;
        }

        $data["fsInChildOfCategory"] = $category->fsInChildOfCategory();
        return $data;
    }

    function reportByDateWard(Request $request){
        $category = Category::where('slug','y-te')->first();

        $data = [];

        
        $data1 = [];
        foreach ($category->childs() as $key => $value) {
            $food_safetys_count = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('date_checked.ngay_xac_nhan_hien_thuc','>=',$request->startDate)
                    ->where('date_checked.ngay_xac_nhan_hien_thuc','<=' ,$request->endDate)
                    ->count();
            $food_safetys_count2 = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('date_checked.ngay_kiem_tra_2','>=',$request->startDate)
                    ->where('date_checked.ngay_kiem_tra_2','<=', $request->endDate)
                    ->count();
            $food_safetys_count3 = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('date_checked.ngay_kiem_tra_3','>=',$request->startDate)
                    ->where('date_checked.ngay_kiem_tra_3','<=', $request->endDate)
                    ->count();
            $food_safetys_count_pass = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('date_checked.ket_qua_kiem_tra_1', 'Đạt')
                    ->where('date_checked.ngay_xac_nhan_hien_thuc','>=',$request->startDate)
                    ->where('date_checked.ngay_xac_nhan_hien_thuc','<=', $request->endDate)
                    ->count();
            $food_safetys_count2_pass = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                    ->where('date_checked.ngay_kiem_tra_2','>=',$request->startDate)
                    ->where('date_checked.ngay_kiem_tra_2','<=', $request->endDate)
                    ->count();
            $food_safetys_count3_pass = Food_safety::join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id', $value->id)
                    ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                    ->where('date_checked.ngay_kiem_tra_3','>=',$request->startDate)
                    ->where('date_checked.ngay_kiem_tra_3','<=', $request->endDate)
                    ->count();
            
            $count = $food_safetys_count+$food_safetys_count2+$food_safetys_count3;
            $countPass = $food_safetys_count_pass+$food_safetys_count2_pass
                +$food_safetys_count3_pass;
            $rating = "0";
            if($count>0) $rating = round($countPass/$count*100, 2);
            
            $data1[$value->name] = $count."/".$countPass."/".$rating."%";
        }
        $data['wards'] = $data1;

        $data["fsInChildOfCategory"] = $category->fsInChildOfCategoryWard($request->ward_id);
        return $data;
    }

    function month_report_test($month,Request $request){
        $data = [];
        $foodSafetyDateCheckeds = Food_safety::join('date_checked',
                                'date_checked.food_safety_id', 'food_safeties.id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.ward_id', $request->ward_id)
                                ->where('date_checked.year', $request->year)
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["tests"] = Test::pluck('name')->toArray();
        return $data;
    }

    function month_report_test_master($month,Request $request){
        $data = [];
        $foodSafetyDateCheckeds = Food_safety::join('date_checked',
                                'date_checked.food_safety_id', 'food_safeties.id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('date_checked.year', $request->year)
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["wards"] = Ward::all();
        $data["tests"] = Test::pluck('name')->toArray();
        return $data;
    }
}
