@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
			<div class="section-header w-100">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3 class="w-100 mb-5">Thêm bảng tin</h3>
              <!-- <h4>Thêm bảng tin</h4> -->
              <form action="/post/store" enctype="multipart/form-data" method="post" >
                {{ csrf_field() }}
                <table class="table">
                  <tr>
                    <td><h6>Chọn kiểu</h6></td>
                    <td>
                      <select class="form-control" name="type" style="width: 150px">
                        <option>Video</option>
                        <option>Image</option>
                        <option>Hệ thống pháp luật</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><h6>Chọn file</h6></td>
                    <td>
                      <input type="file" name="file" class="form-control" >
                    </td>
                  </tr>
                  <tr>
                    <td><h6>Thêm mô tả</h6></td>
                    <td>
                      <textarea class="form-control" name="text"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <button class="btn btn-primary">Thêm</button>
                    </td>
                  </tr>
                </table>
              </form>
						</div>
					</div>
				</div>
			</div>
             
      
      
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        
    </script>

@endsection