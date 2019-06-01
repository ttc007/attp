<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food_safety;
use App\Category;
use App\Ward;

class ReportController extends Controller
{
    function month_report($month,Request $request){
    	$category = Category::where('slug','y-te')->first();

    	$data = [];
    	for($i=1;$i<=$month;$i++) {
    		$data1 = [];
    		foreach ($category->childs() as $key => $value) {
    			if($request->year=="2018"){
                        $food_safetys_count = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                     ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                    ->whereMonth('food_safeties.ngay_xac_nhan_hien_thuc','=',$i)
                                    ->whereYear('food_safeties.ngay_xac_nhan_hien_thuc', $request->year)
                                    ->count();
                        $food_safetys_count2 = Food_safety::join('villages','villages.id',
                            'food_safeties.village_id')
                                    ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                    ->where('food_safeties.categoryb2_id',$value->id)
                                    ->whereMonth('food_safeties.ngay_kiem_tra_2','=',$i)
                                    ->whereYear('food_safeties.ngay_kiem_tra_2', $request->year)
                                    ->count();
                        $food_safetys_count3 = Food_safety::join('villages','villages.id',
                            'food_safeties.village_id')
                                    ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                    ->where('food_safeties.categoryb2_id',$value->id)
                                    ->whereMonth('food_safeties.ngay_kiem_tra_3','=',$i)
                                    ->whereYear('food_safeties.ngay_kiem_tra_3', $request->year)
                                    ->count();
                } else {
                       $food_safetys_count = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                ->whereMonth('date_checked.ngay_xac_nhan_hien_thuc','=',$i)
                                ->whereYear('date_checked.ngay_xac_nhan_hien_thuc', $request->year)
                                ->count();
                       $food_safetys_count2 = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                ->whereMonth('date_checked.ngay_kiem_tra_2','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_2', $request->year)
                                ->count();
                       $food_safetys_count3 = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                ->whereMonth('date_checked.ngay_kiem_tra_3','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_3', $request->year)
                                ->count();
                        $food_safetys_count_pass = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                ->where('date_checked.ket_qua_kiem_tra_1', 'Đạt')
                                ->whereMonth('date_checked.ngay_xac_nhan_hien_thuc','=',$i)
                                ->whereYear('date_checked.ngay_xac_nhan_hien_thuc', $request->year)
                                ->count();
                       $food_safetys_count2_pass = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                                ->whereMonth('date_checked.ngay_kiem_tra_2','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_2', $request->year)
                                ->count();
                       $food_safetys_count3_pass = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id',$request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                                ->where('date_checked.ket_qua_kiem_tra_3', 'Đạt')
                                ->whereMonth('date_checked.ngay_kiem_tra_3','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_3', $request->year)
                                ->count();
                }
                $count = $food_safetys_count+$food_safetys_count2+$food_safetys_count3;
                $countPass = $food_safetys_count_pass+$food_safetys_count2_pass
                    +$food_safetys_count3_pass;
                $rating = "0";
                if($count>0) $rating = round($countPass/$count*100, 2);
                
                $data1[$value->name] = $count."/".$countPass."/".$rating."%";
    		}
    		$data["cate"][$i] = $data1;
    	}
        $data["fsInChildOfCategory"] = $category->fsInChildOfCategory();
    	return $data;
    }

    function month_report_master($month,Request $request){
        $category = Category::where('slug','y-te')->first();

        $data2 = [];
        
        for($i=1;$i<=$month;$i++) {
            $data = [];
            foreach (Ward::all() as $key => $ward) {
                $data1 = [];
                foreach ($category->childs() as $key => $value) {
                    if($request->year=="2018"){
                            $food_safetys_count = Food_safety::join('villages','villages.id',
                                   'food_safeties.village_id')
                                         ->where('villages.parent_id',$ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                        ->whereMonth('food_safeties.ngay_xac_nhan_hien_thuc','=',$i)
                                        ->whereYear('food_safeties.ngay_xac_nhan_hien_thuc', $request->year)
                                        ->count();
                            $food_safetys_count2 = Food_safety::join('villages','villages.id',
                                'food_safeties.village_id')
                                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                        ->where('food_safeties.categoryb2_id',$value->id)
                                        ->whereMonth('food_safeties.ngay_kiem_tra_2','=',$i)
                                        ->whereYear('food_safeties.ngay_kiem_tra_2', $request->year)
                                        ->count();
                            $food_safetys_count3 = Food_safety::join('villages','villages.id',
                                'food_safeties.village_id')
                                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                        ->where('food_safeties.categoryb2_id',$value->id)
                                        ->whereMonth('food_safeties.ngay_kiem_tra_3','=',$i)
                                        ->whereYear('food_safeties.ngay_kiem_tra_3', $request->year)
                                        ->count();
                    } else {
                        $food_safetys_count = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                ->whereMonth('date_checked.ngay_xac_nhan_hien_thuc','=',$i)
                                ->whereYear('date_checked.ngay_xac_nhan_hien_thuc', $request->year)
                                ->count();
                        $food_safetys_count2 = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                ->whereMonth('date_checked.ngay_kiem_tra_2','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_2', $request->year)
                                ->count();
                        $food_safetys_count3 = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                ->whereMonth('date_checked.ngay_kiem_tra_3','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_3', $request->year)
                                ->count();
                        $food_safetys_count_pass = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                ->where('date_checked.ket_qua_kiem_tra_1', 'Đạt')
                                ->whereMonth('date_checked.ngay_xac_nhan_hien_thuc','=',$i)
                                ->whereYear('date_checked.ngay_xac_nhan_hien_thuc', $request->year)
                                ->count();
                        $food_safetys_count2_pass = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                                ->whereMonth('date_checked.ngay_kiem_tra_2','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_2', $request->year)
                                ->count();
                        $food_safetys_count3_pass = Food_safety::join('villages','villages.id',
                               'food_safeties.village_id')
                                ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                                ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                                ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                                ->whereMonth('date_checked.ngay_kiem_tra_3','=',$i)
                                ->whereYear('date_checked.ngay_kiem_tra_3', $request->year)
                                ->count();
                    }
                    
                    $count = $food_safetys_count+$food_safetys_count2+$food_safetys_count3;
                    $countPass = $food_safetys_count_pass+$food_safetys_count2_pass
                        +$food_safetys_count3_pass;
                    $rating = "0";
                    if($count>0) $rating = round($countPass/$count*100, 2);
                    

                    $data1[$value->name] = $count."/".$countPass."/".$rating."%";
                }
                $data[$ward->name] = $data1;
            }
            $data2[$i] = $data;

        }
        $data2["fsInChildOfCategory"] = $category->fsInChildOfCategory();
        return $data2;
    }

    function reportByDate(Request $request){
        $category = Category::where('slug','y-te')->first();

        $data = [];
        foreach (Ward::all() as $key => $ward) {
            $data1 = [];
            foreach ($category->childs() as $key => $value) {
                $food_safetys_count = Food_safety::join('villages','villages.id',
                       'food_safeties.village_id')
                        ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','>=',$request->startDate)
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','<=' ,$request->endDate)
                        ->count();
                $food_safetys_count2 = Food_safety::join('villages','villages.id',
                       'food_safeties.village_id')
                        ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ngay_kiem_tra_2','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_2','<=', $request->endDate)
                        ->count();
                $food_safetys_count3 = Food_safety::join('villages','villages.id',
                       'food_safeties.village_id')
                        ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ngay_kiem_tra_3','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_3','<=', $request->endDate)
                        ->count();
                $food_safetys_count_pass = Food_safety::join('villages','villages.id',
                       'food_safeties.village_id')
                        ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ket_qua_kiem_tra_1', 'Đạt')
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','>=',$request->startDate)
                        ->where('date_checked.ngay_xac_nhan_hien_thuc','<=', $request->endDate)
                        ->count();
                $food_safetys_count2_pass = Food_safety::join('villages','villages.id',
                       'food_safeties.village_id')
                        ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('date_checked.ket_qua_kiem_tra_2', 'Đạt')
                        ->where('date_checked.ngay_kiem_tra_2','>=',$request->startDate)
                        ->where('date_checked.ngay_kiem_tra_2','<=', $request->endDate)
                        ->count();
                $food_safetys_count3_pass = Food_safety::join('villages','villages.id',
                       'food_safeties.village_id')
                        ->join('date_checked','date_checked.food_safety_id', 'food_safeties.id')
                        ->where('villages.parent_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
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
}
