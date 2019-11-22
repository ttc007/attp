<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodSafety;
use App\Category;
use App\Ward;
use App\Test;
use Session;
use App\User;
use App\Report;
use Response;
use DB;
use Auth;

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
    	$category = Category::where('slug','YT')->first();

    	$data = [];
        $latestChecks = DB::table('checkeds')
                   ->select('id', 'food_safety_id',
                    DB::raw('MAX(dateChecked) as last_date_checked'))
                   ->groupBy('food_safety_id');
        $checkedSub = DB::table('checkeds')
                ->select('checkeds.id', 'checkeds.result',
                    'checkeds.year', 'checkeds.food_safety_id', 'checkeds.month'
                )
                ->join(DB::raw('(' . $latestChecks->toSql() .') as latestChecks'), 
                    function($join){
                        $join->on('latestChecks.food_safety_id', '=', 'checkeds.food_safety_id')
                            ->on('latestChecks.last_date_checked', '=', 'checkeds.dateChecked');
                    }
                    );
    	$foodSafetyDateCheckeds = DB::table('food_safeties')
                                ->join(DB::raw('(' . $checkedSub->toSql() .') as checkeds'),
                                    'checkeds.food_safety_id', 'food_safeties.id')
                                ->select('food_safeties.*', 'checkeds.month', 'checkeds.result')
                                ->where('food_safeties.status','<>', 'Tạm nghỉ')
                                ->where('food_safeties.category_id', $category->id)
                                ->where('food_safeties.ward_id', $request->ward_id)
                                ->where('checkeds.year', $request->year)
                                ->orderBy('checkeds.id')
                                //->groupBy('checkeds.food_safety_id')
                                ->get();
        $data["foodSafetyDateCheckeds"] = $foodSafetyDateCheckeds;
        $data["fsInChildOfCategory"] = $category->fsInChildOfCategoryWard($request->ward_id);
        $data["categories"] = $category->childs($request->ward_id);
    	return $data;
    }

    function month_report_master($month, Request $request){
        $category = Category::where('slug','YT')->first();
        $wards = Ward::all();
        $categories = $category->childs('1');
        $hql_categories = $category->childs('12');

        $data_res = array();

        foreach ($wards as $key => $ward) {
            $data_res[$ward->name] = array();
            if ($ward->id != 12) {
                for ($i=1; $i <=4 ; $i++) {
                    $data_res[$ward->name]['Quý '. $i] = array();
                    $category_line = array();
                    $count_checked_line = array();
                    foreach ($categories as $key1 => $category) {
                        $category_line[] = $category->name;

                        $count_check = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->count();
                        $count_check_pass = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->where('checkeds.result', 'Đạt')
                            ->count();
                        $count_category = FoodSafety::where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->count();
                        $rate1 = $count_check>0?round(($count_check_pass / $count_check) *100, 2):0;
                        $rate2 = $count_category>0?round(($count_check / $count_category) *100, 2):0;
                        $count_checked_line[] = $count_check . '/' 
                            . $count_check_pass . '/'
                            . $rate1 . '% - '
                            . $count_category . '/'
                            . $rate2 . '%';
                    }
                    if ($i == 1) $data_res[$ward->name]['Quý '. $i]['category'] = $category_line;
                    $data_res[$ward->name]['Quý '. $i]['count'] = $count_checked_line;
                }
            } else {
                for ($i=1; $i <=4 ; $i++) {
                    $data_res[$ward->name]['Quý '. $i] = array();
                    $category_line = array();
                    $count_checked_line = array();
                    foreach ($hql_categories as $key1 => $category) {
                        $category_line[] = $category->name;

                        $count_check = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->count();
                        $count_check_pass = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->where('checkeds.result', 'Đạt')
                            ->count();
                        $count_category = FoodSafety::where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->count();
                        $rate1 = $count_check>0?round(($count_check_pass / $count_check) *100, 2):0;
                        $rate2 = $count_category>0?round(($count_check / $count_category) *100, 2):0;
                        $count_checked_line[] = $count_check . '/' 
                            . $count_check_pass . '/'
                            . $rate1 . '% - '
                            . $count_category . '/'
                            . $rate2 . '%';
                    }
                    $data_res[$ward->name]['Quý '. $i]['category'] = $category_line;
                    $data_res[$ward->name]['Quý '. $i]['count'] = $count_checked_line;
                }
            }
        }
        return $data_res;
    }

    function reportMasterExport(){
        $category = Category::where('slug','YT')->first();
        $wards = Ward::all();
        $categories = $category->childs('1');
        $hql_categories = $category->childs('12');

        $path = public_path("download/excel/Báo cáo theo quý của năm ". date('Y')
            . " (Ngày xuất ". date('d-m-Y') . ").csv");
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        if(!file_exists($path)){
            file_put_contents($path, '');
        }

        $file = fopen($path, "w");

        foreach ($wards as $key => $ward) {
            fputcsv($file, array($ward->name));
            if ($ward->id != 12) {
                for ($i=1; $i <=4 ; $i++) {
                    fputcsv($file, array('Quý '. $i));
                    $category_line = array();
                    $count_checked_line = array();
                    foreach ($categories as $key1 => $category) {
                        $category_line[] = $category->name;

                        $count_check = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->count();
                        $count_check_pass = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->where('checkeds.result', 'Đạt')
                            ->count();
                        $count_category = FoodSafety::where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->count();
                        $rate1 = $count_check>0?round(($count_check_pass / $count_check) *100, 2):0;
                        $rate2 = $count_category>0?round(($count_check / $count_category) *100, 2):0;
                        $count_checked_line[] = $count_check . '/' 
                            . $count_check_pass . '/'
                            . $rate1 . '% - '
                            . $count_category . '/'
                            . $rate2 . '%';
                    }
                    fputcsv($file, $category_line);
                    fputcsv($file, $count_checked_line);
                }
            } else {
                for ($i=1; $i <=4 ; $i++) {
                    fputcsv($file, array('Quý '. $i));
                    $category_line = array();
                    $count_checked_line = array();
                    foreach ($hql_categories as $key1 => $category) {
                        $category_line[] = $category->name;

                        $count_check = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->count();
                        $count_check_pass = FoodSafety::join(
                            'checkeds', 'checkeds.food_safety_id', 'food_safeties.id')
                            ->where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->where('checkeds.year', date('Y'))
                            ->where('checkeds.month', '<=', $i * 3)
                            ->where('checkeds.result', 'Đạt')
                            ->count();
                        $count_category = FoodSafety::where('food_safeties.categoryb2_id', $category->id)
                            ->where('food_safeties.ward_id', $ward->id)
                            ->where('food_safeties.status', '<>', 'Tạm nghỉ')
                            ->count();
                        $rate1 = $count_check>0?round(($count_check_pass / $count_check) *100, 2):0;
                        $rate2 = $count_category>0?round(($count_check / $count_category) *100, 2):0;
                        $count_checked_line[] = $count_check . '/' 
                            . $count_check_pass . '/'
                            . $rate1 . '% - '
                            . $count_category . '/'
                            . $rate2 . '%';
                    }
                    fputcsv($file, $category_line);
                    fputcsv($file, $count_checked_line);
                }
            }
        }

        fclose($file);
        return Response::download($path);
    }



    function reportByDate(Request $request){
        $category = Category::where('slug','YT')->first();
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
        $category = Category::where('slug','YT')->first();
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

    function report1(){
        $hierarchy = 'ward';

        $data_total = DB::table('food_safeties')
            ->select(
                DB::raw('categories.name as category_name'),
                DB::raw('COUNT(food_safeties.id) AS cnt')
            )
            ->leftJoin('categories', function($join){
                $join->on('categories.id', 'food_safeties.categoryb2_id')
                     ->where('categories.hierarchy', 'ward');
            })
            ->where('ward_id', 1)
            ->where('status', '<>', 'Tạm nghỉ')
            ->groupBy('categories.name')
            ->orderBy('categories.name', 'DESC')
            ->get();
        $data_month = array();
        for($i = 1; $i <= 12; $i++){
            $month = $i < 10 ? '0' . $i : $i;
            $data_month['Tháng' . $month] = $this->get_data_month($i);
        }
            
        return view('report.report1', compact('data_total', 'data_month'));
    }

    function get_data_month($month) {
        return DB::table('food_safeties')
            ->select(
                'categories.name',
                DB::raw('SUM( CASE WHEN checkeds.result = "Đạt" THEN 1 ELSE 0 END ) as DAT'),
                DB::raw('SUM( CASE WHEN checkeds.result = "Chưa đạt" THEN 1 ELSE 0 END ) as CHUADAT'),
                DB::raw('SUM( CASE WHEN IFNULL(checkeds.result, 1) = 1 THEN 1 ELSE 0 END ) as KHONGKIEMTRA')
            )
            ->leftJoin(DB::raw('(SELECT id, food_safety_id, result FROM checkeds INNER JOIN (SELECT ' 
                . 'MAX(id) as max_id FROM checkeds GROUP BY food_safety_id) AS max_checks ON '
                . 'max_checks.max_id = checkeds.id WHERE year = ' . date('Y') .') AS checkeds'),
                'checkeds.food_safety_id', 'food_safeties.id')
            ->leftJoin('categories', 'categories.id', 'food_safeties.categoryb2_id')
            ->where('ward_id', Auth::user()->role)
            ->where('status', '<>', 'Tạm nghỉ')
            ->groupBy('categories.name')
            ->orderBy('categories.name', 'DESC')
            ->get();
    }
}
