<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food_safety;
use App\Category;
use App\Village;
use Session;
use Carbon\Carbon;
use File;
use Excel;
use Input;
use App\Ward;
use Illuminate\Support\Facades\DB;


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
        return view('food_safety.view', compact('category_id','villages','categories','category'));
    }

    function create()
    {
        $types = $this->typeRepository->where('app_id',Session::get('app_id'))->get();
        return view('kpi.add',compact('types'));
    }

    public function edit($id)
    {
        $kpi = $this->kpiRepository->find($id);
        $types = $this->typeRepository->where('app_id',Session::get('app_id'))->get();

        return view('kpi.edit', [
            'kpi' => $kpi,
            'types' => $types,
        ]);
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
        return view('food_safety.view',compact('category_id','villages','categories','category'));
    }
    
    function store(Request $request){
        $data = $request->only('ten_co_so', 'ten_chu_co_so', 'village_id', 'ward_id',
                                'phone', 'certification_date',
                                'so_cap', 'ngay_ky_cam_ket', 'ngay_kham_suc_khoe'
                                , 'category_id', 'categoryb2_id',
                                'noi_tieu_thu');
        if($request->food_safety_id==0){
            $food_safety = Food_safety::create($data);
        } else {
            $food_safety = Food_safety::find($request->food_safety_id);
            $food_safety->update($data);
            $check_date = DB::table('date_checked')->where('food_safety_id', $request->food_safety_id)->where('year',$request->year)->first();
            $data_checkDate = $request->only('ngay_xac_nhan_hien_thuc','ngay_kiem_tra_2','ngay_kiem_tra_3', 'ket_qua_kiem_tra_1', 'ket_qua_kiem_tra_2',
                                'ket_qua_kiem_tra_3',
                                'ghi_chu_1','ghi_chu_2', 'ghi_chu_3',
                                'hinh_thuc_xu_phat_1', 'hinh_thuc_xu_phat_2',
                                'hinh_thuc_xu_phat_3','year','food_safety_id');
            $data_checkDate['test_1'] =  $request->test_1a."<br>".
                                        $request->test_1b."<br>".
                                        $request->test_1c."<br>".
                                        $request->test_1d."<br>".
                                        $request->test_1e;
            $data_checkDate['test_2'] =  $request->test_2a."<br>".
                                        $request->test_2b."<br>".
                                        $request->test_2c."<br>".
                                        $request->test_2d."<br>".
                                        $request->test_2e;
            $data_checkDate['test_3'] =  $request->test_3a."<br>".
                                        $request->test_3b."<br>".
                                        $request->test_3c."<br>".
                                        $request->test_3d."<br>".
                                        $request->test_3e;                            
            
            if($check_date){
                 DB::table('date_checked')->where('food_safety_id', $request->food_safety_id)->where('year',$request->year)
                 ->update($data_checkDate);
            } else {
                 DB::table('date_checked')->insert($data_checkDate);
            }
        }
        return redirect()->back();
    }

    function api_get(Request $request){
        $food_safeties = Food_safety::where('food_safeties.category_id',$request->category_id)
                        ->where('ward_id',$request->ward_id)
                        ->get();
        foreach ($food_safeties as $key => $value) {
            $value->village = @Village::find($value->village_id)->name;
            $certification_date = Carbon::parse($value->certification_date)->addYears(3)->addDays(7);
            if($certification_date<Carbon::now()) 
            $value->certification_date = "<b class='text-danger'>".Carbon::parse($value->certification_date)->format('d-m-Y')."<b>";
            else $value->certification_date = Carbon::parse($value->certification_date)->format('d-m-Y');

            if($value->ngay_kham_suc_khoe!=""){
                $ngay_kham_suc_khoe = Carbon::parse($value->ngay_kham_suc_khoe)->addYears(1)->addDays(7);
                if($ngay_kham_suc_khoe<Carbon::now()) 
                $value->ngay_kham_suc_khoe = "<b class='text-danger'>".Carbon::parse($value->ngay_kham_suc_khoe)->format('d-m-Y')."<b>";
                else $value->ngay_kham_suc_khoe = Carbon::parse($value->ngay_kham_suc_khoe)->format('d-m-Y');
            }

            if($value->ngay_ky_cam_ket!=""){
                $ngay_ky_cam_ket = Carbon::parse($value->ngay_ky_cam_ket)->addYears(3)->addDays(7);
                if($ngay_ky_cam_ket<Carbon::now()) 
                $value->ngay_ky_cam_ket = "<b class='text-danger'>".Carbon::parse($value->ngay_ky_cam_ket)->format('d-m-Y')."<b>";
                else $value->ngay_ky_cam_ket = Carbon::parse($value->ngay_ky_cam_ket)->format('d-m-Y');
            }
            
            if($value->ngay_xac_nhan_hien_thuc!=null)
            $value->ngay_xac_nhan_hien_thuc = Carbon::parse($value->ngay_xac_nhan_hien_thuc)->format('d-m-Y');

            if($value->ngay_kiem_tra_2!=null)
            $value->ngay_kiem_tra_2 = Carbon::parse($value->ngay_kiem_tra_2)->format('d-m-Y');

            if($value->ngay_kiem_tra_3!=null)
            $value->ngay_kiem_tra_3 = Carbon::parse($value->ngay_kiem_tra_3)->format('d-m-Y');

            $value->category_2 = @Category::find($value->categoryb2_id)->name;
            
            $check_dates = DB::table('date_checked')->where('food_safety_id', $value->id)->get();
            $value->check_dates = $check_dates;
        }
        return $food_safeties;
    }

    function api_show($id, Request $request){
        $food_safety = Food_safety::find($id);
        $date_checked = DB::table('date_checked')->where('food_safety_id', $id)->where('year',$request->year)->first();
        
        $food_safety->date_checked = $date_checked;
        return $food_safety;
    }

    function api_delete(Request $request){
        $food_safety = Food_safety::find($request->id)->delete();
        return 200;
    }




    function upfile_csv(){
        return view('food_safety.upfile_csv');
    }

    function upfile_csv_store(Request $request){
        $path = $request->file('file')->getRealPath();
        // $result = Excel::load($path)->all();          
        // var_dump($result);  
        Excel::load($path, function($reader) {
            $reader->ignoreEmpty(); 
            $reader->each(function($sheet){
                $sheet->each(function($row){
                    $cate1 = Category::where('name',$row->nhom)->first();
                    $cate2 = Category::where('name',$row->nganh_nghe_kinh_doanh)->first();
                    $village = Village::where('name',$row->dia_chi_co_so)->first();
                    $food_safety = Food_safety::where('ten_chu_co_so',$row->chu_co_so);
                    if($village)$food_safety = $food_safety->where('village_id',$village->id);
                    if($cate1) $food_safety=$food_safety->where('category_id',$cate1->id);
                    if($cate2) $food_safety=$food_safety->where('categoryb2_id',$cate2->id);             
                    $food_safety=$food_safety->first();
                    if($food_safety&&$row->chu_co_so!=""){
                        $food_safety->update([
                            'ten_co_so'=>$row->chu_co_so,
                            'ten_chu_co_so'=>$row->chu_co_so,
                            'village_id'=>@$village->id,
                            'phone'=>$row->dien_thoai,
                            'certification_date'=>$row->ngay_cap,
                            'so_cap'=>$row->so_gcn,
                            'category_id'=>@$cate1->id,
                            'categoryb2_id'=>@$cate2->id,
                            'noi_tieu_thu'=>$row->noi_tieu_thu
                        ]);
                    }
                    else if($row->chu_co_so!="")
                    $food_safety = Food_safety::create([
                        'ten_co_so'=>$row->chu_co_so,
                        'ten_chu_co_so'=>$row->chu_co_so,
                        'village_id'=>@$village->id,
                        'phone'=>$row->dien_thoai,
                        'certification_date'=>$row->ngay_cap,
                        'so_cap'=>$row->so_gcn,
                        'category_id'=>@$cate1->id,
                        'categoryb2_id'=>@$cate2->id,
                        'noi_tieu_thu'=>$row->noi_tieu_thu
                        //'address'=>$row->dia_chi
                    ]);
                }); 
            }); 
        },'UTF-8')->get();
        return redirect('/food_safety/y-te');
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

    function report(){
        $ward = Ward::find(Session::get('ward_id'));
        return view('food_safety.report',compact('ward'));
    }

    function reportMaster(){
        return view('food_safety.reportMaster');
    }

    function reportUnexpected(){
        return view('food_safety.reportUnexpected');
    }

    function reportUnexpectedWard(){
        $ward = Ward::find(Session::get('ward_id'));
        return view('food_safety.reportUnexpectedWard', compact('ward'));
    }
}
