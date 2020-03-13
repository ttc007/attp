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
                 <b>{{@$ward->name}}</b> 
                / @if($category){{$category->name}}@endif</h3>
						</div>
					</div>
				</div>
			</div>
      
		<section class="box-typical col-sm-12">
        <div id="toolbar">
            <div class="bootstrap-table-header">Quản lí An toàn thực phẩm</div>
                @if(Auth::user()&&Auth::user()->role==Session::get('ward_id'))
                  <a class="btn call-overlay" data-overlay="contact" onclick="addNew()"><i class="fa fa-plus"></i>Thêm</a>
                  <a class="btn" href='upfile_csv'>Download csv</a>
                @endif
                <br>
            </div>
        <div class="row my-3">
            <div class="col-md-2">
              <b>Chọn năm</b><br>
              <select class="form-control" 
                style="width:100%;display:inline-block" id="GLOBAL_YEAR">
                  <option>2018</option>
                  <option>2019</option>
                  <option selected>2020</option>
                  <option>2021</option>
              </select>
            </div>
            <div class="col-md-2">
              <b>Chọn nhóm</b><br>
              <select class="form-control" 
                style="width:100%;display:inline-block" id="categoryFilter">
                  <option></option>
                  @foreach($categories as $key => $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <b>Chọn thôn</b><br>
              <select class="form-control" 
                style="width:100%;display:inline-block" id="villageFilter">
                  <option></option>
                  @foreach($villages as $key => $village)
                    <option value="{{$village->id}}">{{$village->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <b>Mã số cơ sở</b><br>
              <input type="" name="" id='codeFilter' class="form-control" >
            </div>
            <div class="col-md-2">
              <b>Trạng thái kiểm tra</b><br>
              <select class="form-control" id="statusCheck">
                <option></option>
                <option>Đạt</option>
                <option>Chưa đạt</option>
                <option>Chưa kiểm tra</option>
              </select>
            </div>
            <div class="col-md-2">
              &nbsp;<br>
              <a class="btn btn-primary" onclick="filter()">Lọc</a>
            </div>
        </div>
        <div class="table-responsive" id="project-uid" data-uid="all">
            <table id="table" class="table table-bordered">
              <tr>
                <th style="width: 20px">STT</th>
                <th style="width: 380px">Tên chủ cơ sở</th>
                <th>Lịch sử kiểm tra năm 2019</th>
                <th style="width: 100px">Trạng thái</th>
                <th style="width: 50px">Hành động</th>
              </tr>
              <tbody id="tbody">
              </tbody>
            </table>
            <div style="float: right;max-width: 900px">
              <ul id="paginate" class="pagination"></ul>
            </div>
        </div>
    </section>

  	<!--Outside Overlay-->
    <div class="outside-overlay contact">
      <!--Overlay-->
      <div class="overlay" style="overflow: auto">
        <div class="section-header">
          <div class="tbl">
              <div class="tbl-row">
                  <div class="tbl-cell">
                      <h3>THÔNG TIN CƠ SỞ</h3>
                      <ol class="buttons">
                          <span class="font-icon font-icon-del overlay-close" onclick='$(".outside-overlay.contact").css("display", "none")'></span>
                      </ol>
                  </div>
              </div>
          </div>
        </div>
        
        <div class='row mx-4'>
          <div class="text-muted w-100">*Mẹo: Đối với mã cơ sở và mã kiểm tra. Bạn có thể để trống hệ thống sẽ tự động tạo</div>
          <div class="col-md-6">
              @include('include.formfsinfo') 
          </div>
          <div class="col-md-6" id='form-checked-right'>
              @include('include.formfschecked') 
          </div>
      </div><!--Overlay-->
    </div><!--Outside Overlay-->
      
@endsection

@section('script')
    <!-- <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-export.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/tableExport.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-food-safety.js')}}"></script> -->
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script type="text/javascript">
      
      filter('', 'endLoading', 1);

      function addTest( testName,TestValue){
          var rowTest = $(`<div  class="w-100 row mt-2 testRow">
            <div class="col-sm-7 form-group">
              <select class="form-control test_name">
                  @foreach($tests as $test)
                    <option value="{{$test->id}}">{{$test->name}}</option>
                  @endforeach 
              </select>
            </div>
            <div class="col-sm-4 form-group">
                <select class="form-control test_value">
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
          var divRemoveTest = $(`<div class="col-sm-1 form-group divRemoveTest">
          </div>`);
          divRemoveTest.append(aRemoveTest)
          $("#divTest").append(rowTest);
          $(rowTest).append(divRemoveTest);
          $(rowTest).find(".test_name").val(testName).change();
          $(rowTest).find(".test_value").val(TestValue).change();
        }
    </script>

@endsection