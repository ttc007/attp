@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<style>
  
</style>
<input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
<input type="hidden" id="role" value="{{Auth::user()?'':'Guest'}}">
<input type="hidden" id="category_id_page" value="{{$category->name}}">
			<div class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>
                 <b>{{app('App\Http\Controllers\UserController')->session_Ward_name()}}</b> 
                / @if($category){{$category->name}}@endif</h3>
						</div>
					</div>
				</div>
			</div>
      
			<section class="box-typical col-sm-12">
        <div id="toolbar">
            
            <div class="bootstrap-table-header">Quản lí An toàn thực phẩm</div>
                @if(Auth::user()&&Auth::user()->role==Session::get('ward_id'))
                <a class="btn call-overlay" data-overlay="contact"><i class="fa fa-plus"></i>Thêm</a>
                <!-- <a href="/food_safety/upfile_csv" class="btn"><i class="fa fa-plus"></i>
                Upfile</a> -->
                @endif
                <!-- <a href="/food_safety/report" class="btn"><i class="fa fa-plus"></i>Báo cáo</a> -->
                <br>Chọn năm<select class="form-control" style="width:100px;display:inline-block" id="GLOBAL_YEAR">
                                        <option>2018</option>
                                        <option selected>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                </select>
            </div>
          
        <div class="table-responsive" id="project-uid" data-uid="all">
            <table id="table"
               class="table table-striped"
               data-toolbar="#toolbar"
               data-search="true"
               data-show-refresh="true"
               data-show-toggle="true"
               data-show-columns="true"
               data-show-export="true"
               data-detail-view="true"
               data-detail-formatter="detailFormatter"
               data-minimum-count-columns="2"
               data-show-pagination-switch="true"
               data-pagination="true"
               data-id-field="id"
               data-page-list="[20, 25, 50, 100, ALL]"
               data-page-size='20'
               data-show-footer="false"
               data-response-handler="responseHandler">
            </table>
        </div>
    </section>

			<!--Outside Overlay-->
      <div class="outside-overlay contact">
      <!--Overlay-->
      <div class="overlay" style="overflow: auto;width:70%">
      <div class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>TẠO MỚI / UPDATE</h3>
                    <ol class="buttons">
                        <span class="font-icon font-icon-del overlay-close" onclick='$(".outside-overlay.contact").css("display", "none")'></span>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('food_safety.store')}}"  method="POST" id="formAddFoodSafety">
      <input type="hidden" id="category_id" name="category_id" value="{{$category_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-typical box-typical-padding col-sm-12">
            <div class="row">
                <input type="hidden" id='food_safety_id' name="food_safety_id" value="0">
                <input type="hidden" id='ward_id' name="ward_id" value="{{Session::get('ward_id')}}">
                <label class="col-sm-2 form-control-label pt-3">Tên chủ cơ sở</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="ten_chu_co_so" type="text" class="form-control" 
                      id="ten_chu_co_so" required>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Tên cơ sở</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="ten_co_so" type="text" class="form-control" 
                      id="ten_co_so" required>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Trạng thái</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <select name="status" class="form-control" style="width: 200px">
                        <option>Đang hoạt động</option>
                        <option>Tạm nghỉ</option>
                      </select>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Nhóm</label>
                <div class="col-sm-8 form-group pt-2" data-autoclose="true">
                   <p class="form-control-static">
                      <select id='categoryb2_id' name='categoryb2_id' class="form-control">
                          <option value="0">--</option>
                          @foreach($categories as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach                         
                      </select>
                  </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Thôn</label>
                <div class="col-sm-8 form-group pt-2" data-autoclose="true">
                   <p class="form-control-static">
                      <select id='village_id' name="village_id" class="form-control">
                          @foreach($villages as $village)
                            <option value="{{$village->id}}">{{$village->name}}</option>
                          @endforeach                         
                      </select>
                  </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Số điện thoại</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="phone" type="text" class="form-control" 
                      id="phone"  style="width: 300px">
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 form-control-label pt-3">Ngày ký cam kết</label>
                <div class="col-sm-3 form-group">
                            <input id="certification_date" name='certification_date' type="date" value="" class="form-control" >
                </div>
                <label class="col-sm-2 form-control-label pt-3">Số cấp</label>
                <div class="col-sm-4 form-group">
                    <p class="form-control-static">
                      <input name="so_cap" type="text" class="form-control" 
                      id="so_cap">
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 form-control-label pt-3">Ngày khám sức khỏe</label>
                <div class="col-sm-3 form-group">
                            <input id="ngay_kham_suc_khoe" name='ngay_kham_suc_khoe' type="date" value="" class="form-control" >
                </div>
                
                <label class="col-sm-3 form-control-label pt-3">Ngày tập huấn kiến thức</label>
                <div class="col-sm-3 form-group">
                            <input id="ngay_ky_cam_ket" name="ngay_ky_cam_ket" type="date" value="" class="form-control" >
                </div>
                
            </div>
            <br>Chọn năm<select class="form-control" style="width:100px;display:inline-block" name="year" id="GLOBAL_YEAR_EDIT" onchange="edit()">
                                        <option>2018</option>
                                        <option selected>2019</option>
                                        <option>2020</option>
                                </select>
            <div class="row p-3 m-1" style="border:1px solid #ddd">
                <label class="col-sm-3 form-control-label pt-3">Ngày kiểm tra(lần 1)</label>
                <div class="col-sm-3 form-group">
                            <input id="ngay_xac_nhan_hien_thuc" name="ngay_xac_nhan_hien_thuc" type="date" value="" class="form-control" >
                </div>
                <label class="col-sm-3 form-control-label pt-3">Kết quả</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="ket_qua_kiem_tra_1" name="ket_qua_kiem_tra_1">
                        <option value="">--Chọn--</option>
                        <option>Đạt</option>
                        <option>Chưa đạt</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-3">Nội dung chưa đạt</label>
                <div class="col-sm-3 form-group">
                    <input id="ghi_chu_1" name="ghi_chu_1" type="text" value="" class="form-control" >
                </div>
                <label class="col-sm-3 form-control-label pt-3">Hình thức xử lí</label>
                <div class="col-sm-3 form-group">
                    <input id="hinh_thuc_xu_phat_1" name="hinh_thuc_xu_phat_1" type="text" value="" class="form-control" >
                </div>
                
                <label class="col-sm-12 form-control-label pt-3">Test nhanh
                  <a class="btn" onclick="addTest(1)">+</a></label>
                <input type="hidden" name="test_1">
                <div id='divTest1' class="divTest w-100">
                  <div class="w-100 row ml-3 mt-2 testRow">
                    <div class="col-sm-3 form-group">
                      <select class="form-control test_name">
                          <option value="" selected="">
                            Chọn 1 loại test
                          </option>
                          @foreach($tests as $test)
                            <option value="{{$test->name}}">{{$test->name}}</option>
                          @endforeach 
                      </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <select class="form-control test_value">
                            <option value="Không kiểm tra">
                              Không kiểm tra
                            </option>
                            <option  value="Âm tính">
                              Âm tính
                            </option>
                            <option value="Dương tính">Dương tính</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                      
                    </div>
                  </div>
                </div>
            </div>

            <div class="row p-3 m-1" style="border:1px solid #ddd">
                <label class="col-sm-3 form-control-label pt-3">Ngày kiểm tra(lần 2)</label>
                <div class="col-sm-3 form-group">
                    <input id="ngay_kiem_tra_2" name="ngay_kiem_tra_2" type="date" value="" class="form-control" >
                </div>
                <label class="col-sm-3 form-control-label pt-3">Kết quả</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="ket_qua_kiem_tra_2" name="ket_qua_kiem_tra_2">
                        <option value="">--Chọn--</option>
                        <option>Đạt</option>
                        <option>Chưa đạt</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-3">Nội dung chưa đạt </label>
                <div class="col-sm-3 form-group">
                    <input id="ghi_chu_2" name="ghi_chu_2" type="text" value="" class="form-control" >
                </div>
                <label class="col-sm-3 form-control-label pt-3">Hình thức xử lí</label>
                <div class="col-sm-3 form-group">
                    <input id="hinh_thuc_xu_phat_2" name="hinh_thuc_xu_phat_2" type="text" value="" class="form-control" >
                </div>
                
                <label class="col-sm-12 form-control-label pt-3">Test nhanh
                  <a class="btn" onclick="addTest(2)">+</a></label>
                <input type="hidden" name="test_2">
                <div id='divTest2' class="divTest w-100">
                  <div class="w-100 row ml-3 mt-2 testRow">
                    <div class="col-sm-3 form-group">
                      <select class="form-control test_name">
                          <option value="Chọn 1 loại test" selected="">
                            Chọn 1 loại test
                          </option>
                          @foreach($tests as $test)
                            <option value="{{$test->name}}">{{$test->name}}</option>
                          @endforeach 
                      </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <select class="form-control test_value" >
                            <option value="Không kiểm tra" selected="">
                              Không kiểm tra
                            </option>
                            <option  value="Âm tính">
                              Âm tính
                            </option>
                            <option value="Dương tính">Dương tính</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                      
                    </div>
                  </div>
                </div>
            </div>
            <div class="row p-3 m-1" style="border:1px solid #ddd">
                <label class="col-sm-3 form-control-label pt-3">Ngày kiểm tra(lần 3)</label>
                <div class="col-sm-3 form-group">
                            <input id="ngay_kiem_tra_3" name="ngay_kiem_tra_3" type="date" value="" class="form-control" >
                </div>
                <label class="col-sm-3 form-control-label pt-3">Kết quả</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="ket_qua_kiem_tra_3" name="ket_qua_kiem_tra_3">
                        <option value="">--Chọn--</option>
                        <option>Đạt</option>
                        <option>Chưa đạt</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-3">Nội dung chưa đạt </label>
                <div class="col-sm-3 form-group">
                    <input id="ghi_chu_3" name="ghi_chu_3" type="text" value="" class="form-control" >
                </div>
                <label class="col-sm-3 form-control-label pt-3">Hình thức xử lí</label>
                <div class="col-sm-3 form-group">
                    <input id="hinh_thuc_xu_phat_3" name="hinh_thuc_xu_phat_3" type="text" value="" class="form-control" >
                </div>
                
                <label class="col-sm-12 form-control-label pt-3">Test nhanh
                  <a class="btn" onclick="addTest(3)">+</a></label>
                <input type="hidden" name="test_3">
                <div id='divTest3' class="divTest w-100">
                  <div  class="w-100 row ml-3 mt-2 testRow">
                    <div class="col-sm-3 form-group">
                      <select class="form-control test_name">
                          <option value="Chọn 1 loại test" selected="">
                            Chọn 1 loại test
                          </option>
                          @foreach($tests as $test)
                            <option value="{{$test->name}}">{{$test->name}}</option>
                          @endforeach 
                      </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <select class="form-control test_value">
                            <option value="Không kiểm tra" selected="">
                              Không kiểm tra
                            </option>
                            <option  value="Âm tính">
                              Âm tính
                            </option>
                            <option value="Dương tính">Dương tính</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                      
                    </div>
                  </div>
                </div>
            </div>
            @if($category->slug=="nong-nghiep")
            <div class="row">
                <label class="col-sm-3 form-control-label pt-3">Nơi tiêu thụ(đối với nông nghiệp)</label>
                <div class="col-sm-3 form-group">
                    <input id="noi_tieu_thu" name="noi_tieu_thu" type="text" value="" class="form-control" >
                </div>
            </div>
            @endif
            <div class="form-group row">
              <div class="col-sm-4"></div>
              <div class="col-sm-10 py-4">        
                  <a class='btn ' onclick="addOrUpdateFoodSafety()" >Thêm / Update</a>
                  <a class='btn btn-danger overlay-close' onclick='$(".outside-overlay.contact").css("display", "none")'>Thoát</a>
              </div>
            </div>

        </div>
      </form>
    </div>
    </div><!--Overlay-->
    </div><!--Outside Overlay-->
      
@endsection

@section('script')
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-export.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/tableExport.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-food-safety.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        function detailFormatter(index, row) {
            var html = [];
            $.each(row, function (key, value) {
                html.push('<p><b>' + key + ':</b> ' + value + '</p>');
            });
            return html.join('');
        }
        function close(){
          $(".overlay").css('display', 'none');
          $(".outside-overlay").css('display', 'none');
        }
        function edit(id){
            if(id==undefined) id = $("#food_safety_id").val();
            $.ajax({
                url:'/api/food_safety/'+id,
                data:{year:$("#GLOBAL_YEAR_EDIT").val()},
                type:'GET',
                success:function(data){
                  console.log(data);

                  $(".overlay").css('display', 'block');
                  $(".outside-overlay").css('display', 'block');
                  $("#food_safety_id").val(data.id);
                  $("#ten_chu_co_so").val(data.ten_chu_co_so);
                  $("#ten_co_so").val(data.ten_co_so);
                  $("#village_id").val(data.village_id);
                  $("#categoryb2_id").val(data.categoryb2_id);
                  $("#phone").val(data.phone);
                  $("#certification_date").val(data.certification_date);
                  $("#so_cap").val(data.so_cap);
                  $("#ngay_kham_suc_khoe").val(data.ngay_kham_suc_khoe);
                  $("#ngay_ky_cam_ket").val(data.ngay_ky_cam_ket);
                  $("[name=status]").val(data.status);
                  
                  $("#noi_tieu_thu").val(data.noi_tieu_thu);

                  var date_checked = {};
                  if(data.date_checked) date_checked = data.date_checked;

                  if(date_checked){
                    $("#ngay_xac_nhan_hien_thuc").val(date_checked.ngay_xac_nhan_hien_thuc);
                    $("#ngay_kiem_tra_2").val(date_checked.ngay_kiem_tra_2);
                    $("#ngay_kiem_tra_3").val(date_checked.ngay_kiem_tra_3);
                    
                    $("#ket_qua_kiem_tra_1").val(date_checked.ket_qua_kiem_tra_1);
                    $("#ket_qua_kiem_tra_2").val(date_checked.ket_qua_kiem_tra_2);
                    $("#ket_qua_kiem_tra_3").val(date_checked.ket_qua_kiem_tra_3);

                    $("#ghi_chu_1").val(date_checked.ghi_chu_1);
                    $("#ghi_chu_2").val(date_checked.ghi_chu_2);
                    $("#ghi_chu_3").val(date_checked.ghi_chu_3);

                    $("#hinh_thuc_xu_phat_1").val(date_checked.hinh_thuc_xu_phat_1);
                    $("#hinh_thuc_xu_phat_2").val(date_checked.hinh_thuc_xu_phat_2);
                    $("#hinh_thuc_xu_phat_3").val(date_checked.hinh_thuc_xu_phat_3);
                  }
                  
                  if(!data.date_checked) {
                    data.date_checked = {
                      test_1:"",
                      test_2:"",
                      test_3:""
                    }
                  }else {
                    if(!data.date_checked.test_1) data.date_checked.test_1="";
                    if(!data.date_checked.test_2) data.date_checked.test_2="";
                    if(!data.date_checked.test_3) data.date_checked.test_3="";
                  }
                  var test_1_arr = data.date_checked.test_1.split("<br>");
                  var test_2_arr = data.date_checked.test_2.split("<br>");
                  var test_3_arr = data.date_checked.test_3.split("<br>");
                  
                  $("#divTest1").empty();
                  if(data.date_checked.test_1!=""){
                    $.each(test_1_arr, function(i, test_1_row){
                      addTest(1, test_1_row);
                    });
                  } else {
                    addTest(1);
                  }

                  $("#divTest2").empty();
                  if(data.date_checked.test_2!=""){
                    $.each(test_1_arr, function(i, test_2_row){
                      addTest(2, test_2_row);
                    });
                  } else {
                    addTest(2);
                  }

                  $("#divTest3").empty();
                  if(data.date_checked.test_3!=""){
                    $.each(test_1_arr, function(i, test_3_row){
                      addTest(3, test_3_row);
                    });
                  } else {
                    addTest(3);
                  }
                }
            });
        }

        function addTest(number, testNameAndTestValue){
          var rowTest = $(`<div  class="w-100 row ml-3 mt-2 testRow">
            <div class="col-sm-3 form-group">
              <select class="form-control test_name">
                  <option value="Chọn 1 loại test" selected="">
                    Chọn 1 loại test
                  </option>
                  @foreach($tests as $test)
                    <option value="{{$test->name}}">{{$test->name}}</option>
                  @endforeach 
              </select>
            </div>
            <div class="col-sm-3 form-group">
                <select class="form-control test_value">
                    <option value="Không kiểm tra" selected="">
                      Không kiểm tra
                    </option>
                    <option  value="Âm tính">
                      Âm tính
                    </option>
                    <option value="Dương tính">Dương tính</option>
                </select>
            </div>
          </div>`);
          var aRemoveTest = $(`<a class="btn" >-</a>`);
          aRemoveTest.click(function(){
            rowTest.remove();
          });
          var divRemoveTest = $(`<div class="col-sm-6 form-group divRemoveTest">
          </div>`);
          divRemoveTest.append(aRemoveTest)
          $("#divTest"+number).append(rowTest);
          $(rowTest).append(divRemoveTest);
          if(testNameAndTestValue){
            $(rowTest).find(".test_name").val(testNameAndTestValue.split(":")[0]).change();
            $(rowTest).find(".test_value").val(testNameAndTestValue.split(":")[1]).change();
          }
        }

        function addOrUpdateFoodSafety(){
          $.each($(".divTest"), function (i,divTest){
            var number = i+1;
            var test = "";
            var testRows = $(divTest).find(".testRow");
            $.each(testRows, function(j, testRow){
              test+=$(testRow).find(".test_name").val()+":"+$(testRow).find(".test_value").val();
              if(j!=testRows.length-1) test+="<br>";
            });
            $("[name=test_"+number+"]").val(test);
          });
          $("#formAddFoodSafety").submit();
        }
    </script>

@endsection