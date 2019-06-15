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
    <form action="{{route('food_safety.store')}}"  method="POST">
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
                      id="phone">
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
                
                <label class="col-sm-12 form-control-label pt-3">Test nhanh</label>
                
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Hàn the</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_1a">
                        <option value="Hàn the:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Hàn the:Âm tính">
                          Âm tính
                        </option>
                        <option value="Hàn the:Dương tính">Dương tính</option>
                    </select>
                </div>
                
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Formol</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_1b">
                        <option value="Formol:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Formol:Âm tính">
                          Âm tính
                        </option>
                        <option value="Formol:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">
                Độ ôi khét dầu mỡ</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_1c">
                        <option value="Độ ôi khét dầu mỡ:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ ôi khét dầu mỡ:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ ôi khét dầu mỡ:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Độ sạch bát đĩa</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_1d">
                        <option value="Độ sạch bát đĩa:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ sạch bát đĩa:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ sạch bát đĩa:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">
                  Độ sạch tiếp xúc thực phẩm</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_1e">
                        <option value="Độ sạch tiếp xúc thực phẩm:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ sạch tiếp xúc thực phẩm:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ sạch tiếp xúc thực phẩm:Dương tính">Dương tính</option>
                    </select>
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
                <label class="col-sm-12 form-control-label pt-3">Test nhanh</label>
                
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Hàn the</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_2a">
                        <option value="Hàn the:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Hàn the:Âm tính">
                          Âm tính
                        </option>
                        <option value="Hàn the:Dương tính">Dương tính</option>
                    </select>
                </div>
                
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Formol</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_2b">
                        <option value="Formol:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Formol:Âm tính">
                          Âm tính
                        </option>
                        <option value="Formol:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">
                Độ ôi khét dầu mỡ</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_2c">
                        <option value="Độ ôi khét dầu mỡ:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ ôi khét dầu mỡ:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ ôi khét dầu mỡ:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Độ sạch bát đĩa</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_2d">
                        <option value="Độ sạch bát đĩa:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ sạch bát đĩa:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ sạch bát đĩa:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">
                  Độ sạch tiếp xúc thực phẩm</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_2e">
                        <option value="Độ sạch tiếp xúc thực phẩm:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ sạch tiếp xúc thực phẩm:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ sạch tiếp xúc thực phẩm:Dương tính">Dương tính</option>
                    </select>
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
                <label class="col-sm-12 form-control-label pt-3">Test nhanh</label>
                
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Hàn the</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_3a">
                        <option value="Hàn the:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Hàn the:Âm tính">
                          Âm tính
                        </option>
                        <option value="Hàn the:Dương tính">Dương tính</option>
                    </select>
                </div>
                
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Formol</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_3b">
                        <option value="Formol:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Formol:Âm tính">
                          Âm tính
                        </option>
                        <option value="Formol:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">
                Độ ôi khét dầu mỡ</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_3c">
                        <option value="Độ ôi khét dầu mỡ:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ ôi khét dầu mỡ:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ ôi khét dầu mỡ:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">Độ sạch bát đĩa</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_3d">
                        <option value="Độ sạch bát đĩa:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ sạch bát đĩa:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ sạch bát đĩa:Dương tính">Dương tính</option>
                    </select>
                </div>
                <label class="col-sm-3 form-control-label pt-1 test-nhanh">
                  Độ sạch tiếp xúc thực phẩm</label>
                <div class="col-sm-3 form-group">
                    <select class="form-control" id="test_1" name="test_3e">
                        <option value="Độ sạch tiếp xúc thực phẩm:Không kiểm tra">
                          Không kiểm tra
                        </option>
                        <option  value="Độ sạch tiếp xúc thực phẩm:Âm tính">
                          Âm tính
                        </option>
                        <option value="Độ sạch tiếp xúc thực phẩm:Dương tính">Dương tính</option>
                    </select>
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
                  <button class='btn ' >Thêm / Update</button>
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
                  $("[name=test_1a]").val(test_1_arr[0]);
                  $("[name=test_1b]").val(test_1_arr[1]);
                  $("[name=test_1c]").val(test_1_arr[2]);
                  $("[name=test_1d]").val(test_1_arr[3]);
                  $("[name=test_1e]").val(test_1_arr[4]);

                  $("[name=test_2a]").val(test_2_arr[0]);
                  $("[name=test_2b]").val(test_2_arr[1]);
                  $("[name=test_2c]").val(test_2_arr[2]);
                  $("[name=test_2d]").val(test_2_arr[3]);
                  $("[name=test_2e]").val(test_2_arr[4]);

                  $("[name=test_3a]").val(test_3_arr[0]);
                  $("[name=test_3b]").val(test_3_arr[1]);
                  $("[name=test_3c]").val(test_3_arr[2]);
                  $("[name=test_3d]").val(test_3_arr[3]);
                  $("[name=test_3e]").val(test_3_arr[4]);

                }
            })
        }

    </script>

@endsection