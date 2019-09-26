<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodSafety;
use App\Category;
use App\Ward;
use App\Test;
use Session;
use App\User;

class ReportController extends Controller
{
    function report(){
        $ward = Ward::find(Session::get('ward_id'));
        return view('report.report',compact('ward'));
    }

    function reportMaster(){
        return view('report.reportMaster');
    }

    function reportTest(){
        $ward = Ward::find(Session::get('ward_id'));
        return view('report.reportTest',compact('ward'));
    }

    function reportTestMaster(){
        return view('report.reportTestMaster');
    }

    function reportUnexpected(){
        return view('report.reportUnexpected');
    }

    function reportUnexpectedWard(){
        $ward = Ward::find(Session::get('ward_id'));
        return view('report.reportUnexpectedWard', compact('ward'));
    }

    function month_report($month,Request $request){
    	$category = Category::where('slug','y-te')->first();

    	$data = [];
    	$foodSafetyDateCheckeds = FoodSafety::join('checkeds',
                                'checkeds.food_safety_id', 'food_safeties.id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.category_id', $category->id)
                                ->where('food_safeties.ward_id', $request->ward_id)
                                ->where('checkeds.year', $request->year)
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["fsInChildOfCategory"] = $category->fsInChildOfCategoryWard($request->ward_id);
        $data["categories"] = $category->childs($request->ward_id);
    	return $data;
    }

    function month_report_master($month,Request $request){
        $category = Category::where('slug','y-te')->first();
        $data2 = [];
        
        $foodSafetyDateCheckeds = FoodSafety::join('checkeds',
                                'checkeds.food_safety_id', 'food_safeties.id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.category_id', $category->id)
                                ->where('checkeds.year', $request->year)
                                ->get();
        $data2["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data2["fsInChildOfCategory"] = $category->fsInChildOfCategory('1');
        $data2["wards"] = Ward::all();
        $data2["categories"] = $category->childs('1');
        
        $data2["hql_categories"] = $category->childs('12');
        return $data2;
    }

    function reportByDate(Request $request){
        $category = Category::where('slug','y-te')->first();
        $data = [];
        foreach (Ward::all() as $key => $ward) {
            $data1 = [];
            foreach ($category->childs($ward->id) as $key => $value) {
                $count = FoodSafety::join('checkeds','checkeds.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('checkeds.dateChecked','>=',$request->startDate)
                        ->where('checkeds.dateChecked','<=' ,$request->endDate)
                        ->count();
                $countPass = FoodSafety::join('checkeds','checkeds.food_safety_id', 'food_safeties.id')
                        ->where('food_safeties.status','<>', 'Tạm nghỉ')
                        ->where('food_safeties.ward_id', $ward->id)->where('food_safeties.categoryb2_id',$value->id)
                        ->where('checkeds.result', 'Đạt')
                        ->where('checkeds.dateChecked','>=',$request->startDate)
                        ->where('checkeds.dateChecked','<=', $request->endDate)
                        ->count();
                
                $rating = "0";
                if($count>0) $rating = round($countPass/$count*100, 2);
                
                $data1[$value->name] = $count."/".$countPass."/".$rating."%";
            }
            $data['wards'][$ward->name] = $data1;
        }

        $data["fsInChildOfCategory"] = $category->fsInChildOfCategory('0');
        return $data;
    }

    function reportByDateWard(Request $request){
        $category = Category::where('slug','y-te')->first();
        $data = [];
        
        $data1 = [];

        foreach ($category->childs($request->ward_id) as $key => $value) {
            $count = FoodSafety::join('checkeds','checkeds.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('checkeds.dateChecked','>=',$request->startDate)
                    ->where('checkeds.dateChecked','<=' ,$request->endDate)
                    ->count();
            $countPass = FoodSafety::join('checkeds','checkeds.food_safety_id', 'food_safeties.id')
                    ->where('food_safeties.status','<>', 'Tạm nghỉ')
                    ->where('food_safeties.ward_id', $request->ward_id)->where('food_safeties.categoryb2_id',$value->id)
                    ->where('checkeds.result', 'Đạt')
                    ->where('checkeds.dateChecked','>=',$request->startDate)
                    ->where('checkeds.dateChecked','<=', $request->endDate)
                    ->count();
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
        $foodSafetyDateCheckeds = FoodSafety::join('checkeds',
                                'checkeds.food_safety_id', 'food_safeties.id')
                                ->join('checked_tests', 'checkeds.id', 'checked_tests.checked_id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.ward_id', $request->ward_id)
                                ->where('checkeds.year', $request->year)
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["tests"] = Test::pluck('name')->toArray();
        return $data;
    }

    function month_report_test_master($month,Request $request){
        $data = [];
        $foodSafetyDateCheckeds = FoodSafety::join('checkeds',
                                'checkeds.food_safety_id', 'food_safeties.id')
                                ->join('checked_tests', 'checkeds.id', 'checked_tests.checked_id')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('checkeds.year', $request->year)
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["wards"] = Ward::all();
        $data["tests"] = Test::pluck('name')->toArray();
        return $data;
    }
}
