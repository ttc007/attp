<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodSafety;
use App\Category;
use App\Village;
use Session;
use Carbon\Carbon;
use File;
use Input;
use App\Ward;
use App\Test;
use Illuminate\Support\Facades\DB;
use App\Checked;
use App\Providers\XLSXReader;
use Auth;
use App\CheckedTest;

class FoodSafetyController extends BaseController
{

    function getCategories(){
        $categories = Category::where('parent_id',0)->get();
        return $categories;
    }
    function index()
    {
        $category_id = 0;
        $villages = Village::where('parent_id',Session::get('ward_id'))->get();
        $categories = [];
        $category = null;
        $tests = Test::all();
        return view('food_safety.view', compact('category_id','villages',
            'categories','category', 'tests'));
    }

    function create()
    {
        $types = $this->typeRepository->where('app_id',Session::get('app_id'))->get();
        return view('kpi.add',compact('types'));
    }

    function getByCate($category){
        $categories = [];
        $category_id = 0;
        $category = Category::where('slug',$category)->first();
        if($category) {
            $category_id = $category->id;
            $categories = $category->childs();
        }
        $villages = Village::where('parent_id',Session::get('ward_id'))->get();
        $tests = Test::all();
        return view('food_safety.view', compact('category_id','villages','categories','category','tests'));
    }

    function filter(){
        $categories = [];
        $category_id = 0;
        $category = Category::where('slug','y-te')->first();
        if($category) {
            $category_id = $category->id;
            $categories = $category->childs();
        }
        $villages = Village::where('parent_id', Session::get('ward_id'))->get();
        $tests = Test::all();
        return view('food_safety.filter', compact('category_id','villages','categories','category','tests'));
    }
    
    function store(Request $request){
        if(!$request->code) return "Code required";
        $data = $request->only('ten_co_so', 'ten_chu_co_so', 'village_id', 'ward_id',
                                'phone', 'certification_date', 'status',
                                'so_cap', 'ngay_ky_cam_ket', 'ngay_kham_suc_khoe'
                                , 'category_id', 'categoryb2_id', 'code',
                                'noi_tieu_thu');
        if($request->food_safety_id == 0){
            $food_safety = FoodSafety::create($data);
        } else {
            $food_safety = FoodSafety::find($request->food_safety_id);
            $count = FoodSafety::where('code', $request->code)->count();
            if($count == 0 || ($food_safety->code && $request->code == $food_safety->code)) $food_safety->update($data);
            else return "Code duplicate";
        }
        return redirect()->back();
    }

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
            $value->village = @Village::find($value->village_id)->name;
            
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
            
            $value->category_2 = @Category::find($value->categoryb2_id)->name;
            
            $check_dates = DB::table('date_checked')->where('food_safety_id', $value->id)->get();
            $value->check_dates = $check_dates;
        }
        return $food_safeties;
    }


    function api_delete(Request $request){
        $food_safety = FoodSafety::find($request->id)->delete();
        return 200;
    }

    function upfile_csv(){
        return view('food_safety.upfile_csv');
    }

    function upfile_csv_store(Request $request){
        $file = $request->file('file');
        $path = public_path('upload/excel/'.$file->getClientOriginalName());
        $file->move(public_path('/upload/excel'), $file->getClientOriginalName());
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);

        $xlsx = new XLSXReader($path);
        $data = $xlsx->getSheetData('Cơ sở');

        foreach ($data as $key => $rowCoso) {
            if($key > 0){
                // dd($rowCoso);
                $village = Village::where('name', $rowCoso[1])->first();
                $category = Category::where('name', $rowCoso[2])->first();
                if($rowCoso[0] != "" && $rowCoso[3] != "" && $village && $category) {
                    $food_safety = FoodSafety::where('code', $rowCoso[0])->first();
                    $dataInsert = [
                        'code' => $rowCoso[0],
                        'ten_co_so' => $rowCoso[3],
                        'ten_chu_co_so' => $rowCoso[4],
                        'categoryb2_id' => $category->id,
                        'category_id' => Category::find($category->parent_id)->id,
                        'ward_id' => Auth::user()->role,
                        'village_id' => $village->id,
                        'status' => $rowCoso[5],
                        'phone' => $rowCoso[6],
                        'ngay_ky_cam_ket' => $rowCoso[7]?Carbon::parse($rowCoso[7]):null,
                        'ngay_kham_suc_khoe' => $rowCoso[8]?Carbon::parse($rowCoso[8]):null,
                        'certification_date' => $rowCoso[9]?Carbon::parse($rowCoso[9]):null,
                        'so_cap' => $rowCoso[10]
                    ];
                    if($food_safety){
                        $food_safety->update($dataInsert);
                    } else {
                        FoodSafety::create($dataInsert);
                    }
                }
            }
        }

        $dataChecked = $xlsx->getSheetData('Kiểm tra');
        foreach ($dataChecked as $key => $rowChecked) {
            if($key > 0 && $rowChecked[0] != "" && $rowChecked[1] != "" && $rowChecked[4] != ""){
                $checked = Checked::where('code', $rowChecked[0])->first();
                $dateChecked = Carbon::parse($rowChecked[4]);
                $food_safety = FoodSafety::where('code', $rowChecked[1])->first();
                $dataInsertChecked = [
                    'code' => $rowChecked[0],
                    'food_safety_id' => $food_safety->id,
                    'result' => $rowChecked[5],
                    'note' => $rowChecked[6],
                    'penalize' => $rowChecked[7],
                    'year' => $dateChecked->format('Y'),
                    'month' => $dateChecked->format('m'),
                    'day' => $dateChecked->format('d'),
                    'dateChecked' => $dateChecked->format('Y-m-d')
                ];
                if($checked){
                    $checked->update($dataInsertChecked);
                } else {
                    $checked = Checked::create($dataInsertChecked);
                }

                if($checked){
                    CheckedTest::where("checked_id", $checked->id)->delete();
                    for ($i = 8; $i < 14; $i++) {
                        if(isset($rowChecked[$i]) && $rowChecked[$i] != "") {
                            $testName = explode(":", $rowChecked[$i])[0];
                            $testResult = explode(":", $rowChecked[$i])[1];
                            $test = Test::where('name', $testName)->first();
                            CheckedTest::create([
                                'checked_id' => $checked->id,
                                'test_id' => $test->id,
                                'result' => $testResult
                            ]);
                        }
                    }
                }
            }
        }

        return redirect('food_safety/y-te');
    }
    
    // function updateDataWard(){
    //     $wards = Ward::all();
    //     foreach ($wards as $key => $ward) {
    //         $food_safeties = Food_safety::whereIn('village_id', $ward->village_id_array())
    //             ->update([
    //                 "ward_id"=>$ward->id
    //             ]);
    //     }
    // }
    
}
