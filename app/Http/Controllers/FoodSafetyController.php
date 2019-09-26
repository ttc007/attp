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
use Response;

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
            if($key > 0 && $rowCoso[11] == "Cập nhật"){
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
            if($key > 0 && $rowChecked[0] != "" && $rowChecked[1] != "" && $rowChecked[4] != "" && $rowChecked[13] == "Cập nhật"){
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
                    for ($i = 8; $i <= 12; $i++) {
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

    function download_csv(){
        $ward = Ward::find(Auth::user()->role);

        $path = public_path("download/excel/".$ward->name.".csv");
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        if(!file_exists($path)){
            file_put_contents($path, '');
        }

        $file = fopen($path, "w");

        $list = array("Mã số", "Thôn" ,"Nhóm", "Tên cơ sở", "Tên chủ cơ sở", "Trạng thái", "Số điện thoại", "Ngày kí cam kết(3 năm)",
            "Ngày khám sức khỏe(1 năm)", "Ngày tập huấn kiến thức(3 năm)", "Số cấp");
        fputcsv($file, $list);

        $food_safeties = FoodSafety::where("ward_id", Auth::user()->role)->orderBy('code')->get();
        foreach ($food_safeties as $key => $food_safety) {
            $village = Village::find($food_safety->village_id);
            $category = Category::find($food_safety->categoryb2_id);
            
            $ngay_ky_cam_ket = $food_safety->ngay_ky_cam_ket?Carbon::parse($food_safety->ngay_ky_cam_ket):"";
            if($ngay_ky_cam_ket != ""){
                $ngay_ky_cam_ket = $ngay_ky_cam_ket->format('d').".".$ngay_ky_cam_ket->format('m').".".$ngay_ky_cam_ket->format('Y');
            }

            $ngay_kham_suc_khoe = $food_safety->ngay_ky_cam_ket?Carbon::parse($food_safety->ngay_kham_suc_khoe):"";
            if($ngay_kham_suc_khoe != ""){
                $ngay_kham_suc_khoe = $ngay_kham_suc_khoe->format('d').".".$ngay_kham_suc_khoe->format('m').".".$ngay_kham_suc_khoe->format('Y');
            }

            $certification_date = $food_safety->certification_date?Carbon::parse($food_safety->certification_date):"";
            if($certification_date != ""){
                $certification_date = $certification_date->format('d').".".$certification_date->format('m').".".$certification_date->format('Y');
            }

            $data = [$food_safety->code, @$village->name, @$category->name, $food_safety->ten_co_so, $food_safety->ten_chu_co_so,
                    $food_safety->status, $food_safety->phone, $ngay_ky_cam_ket, $ngay_kham_suc_khoe, $certification_date, $food_safety->so_cap  ];

            fputcsv($file, $data);
        }
        fclose($file);
        return Response::download($path);
    }
    
    function download_checked_csv(){
        $ward = Ward::find(Auth::user()->role);

        $path = public_path("download/excel/".$ward->name." kiểm tra.csv");
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        if(!file_exists($path)){
            file_put_contents($path, '');
        }

        $file = fopen($path, "w");

        $list = array("Mã số kiểm tra", "Mã số cơ sở" ,"Tên cơ sở", "Năm kiểm tra", "Ngày kiểm tra", "Kết quả kiểm tra", "Nội dung không đạt",
            "Xử phạt", "Test 1", "Test 2", "Test 3", "Test 4", "Test 5");
        fputcsv($file, $list);

        $checkeds = FoodSafety::join("checkeds", "checkeds.food_safety_id", "food_safeties.id")
            ->where("food_safeties.ward_id", Auth::user()->role)->orderBy('food_safeties.code')->get();
        foreach ($checkeds as $key => $checked) {
            $food_safety = FoodSafety::find($checked->food_safety_id);
            
            $ngay_kiem_tra = Carbon::parse($food_safety->ngay_kiem_tra);
            $ngay_kiem_tra = $ngay_kiem_tra->format('d').".".$ngay_kiem_tra->format('m').".".$ngay_kiem_tra->format('Y');

            $data = [$checked->code, @$food_safety->code, @$food_safety->ten_co_so, $checked->year, $ngay_kiem_tra,
                    $checked->result, $checked->note, $checked->penalize];
            $cheked_tests = CheckedTest::where('checked_id', $checked->id)->get();
            foreach ($cheked_tests as $cheked_test) {
                $test = Test::find($cheked_test->test_id);
                $data[] = @$test->name.":".$cheked_test->result;
            }

            fputcsv($file, $data);
        }
        fclose($file);
        return Response::download($path);
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
