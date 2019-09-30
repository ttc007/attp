@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
			<div class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Food Safety</h3>
						</div>
					</div>
				</div>
			</div>
			<section class="box-typical col-sm-12">
        <div id="toolbar" class="mt-2">
            <div class="bootstrap-table-header">Quản lí xã</div>
                <a href="#" class="btn call-overlay" data-overlay="contact"><i class="fa fa-plus"></i>Thêm 1 xã/phường</a>
        </div>
        <div class="table-responsive" id="project-uid" data-uid="all">
            <table id="table" class="table table-striped table-bordered my-4" >
              <tr>
                  <th>Stt</th>
                  <th>Tên</th>
                  <th>Tên viết tắt</th>
                  <th>Chỉnh sửa</th>
                  <th>Xóa</th>
              </tr>
              @foreach($wards as $key => $ward)
                  <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$ward->name}}</td>
                      <td>{{$ward->slug}}</td>
                      <td><a onclick="editWard('{{$ward->id}}')"><i class="glyphicon glyphicon-edit"></i></a></td>
                      <td><a onclick="deleteWard('{{$ward->id}}')"><i class="glyphicon glyphicon-remove"></i></a></td>
                  </tr>
              @endforeach
            </table>
        </div>
    </section>

		<!--Outside Overlay-->
    <div class="outside-overlay contact">
      <!--Overlay-->
      <div class="overlay">
        <div class="section-header">
          <div class="tbl">
              <div class="tbl-row">
                  <div class="tbl-cell">
                      <h3>TẠO MỚI / UPDATE</h3>
                      <ol class="buttons">
                          <span class="font-icon font-icon-del overlay-close"></span>
                      </ol>
                  </div>
              </div>
          </div>
        </div>
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-typical box-typical-padding col-sm-12">
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Tên xã</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="name" type="text" class="form-control" 
                      id="name" required>
                    </p>
                </div>
            </div>
            <input type="hidden" id="ward_id" value="0">
            <div class="form-group row">
              <div class="col-sm-10">
                  <button class='btn ' onclick="createWard()">Thêm / Update</button>
                  <button class='btn btn-danger overlay-close'>Thoát</button>
              </div>
            </div>
        </div>
    </div>
  </div>
      
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>

      $('.overlay-close').click(function(){
          location.reload();
      });
      function createWard(){
          var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
          $('body').append(loader);
          $.ajax({
            url:'api/ward',
            type:"POST",
            data: {
                name:$("#name").val(),
                ward_id:$("#ward_id").val()
            },
            success:function (data){
              console.log(data);
                swal({
                  title:'Success!',
                  text:'Thêm mới thành công',
                  type:'success'
                }).then(function(){
                    location.reload();
                });
            }
          });
      }

      function editWard(id){
          var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
          $('body').append(loader);
          $(".outside-overlay").css('display','block');
          $(".overlay").css('display','block');
          $.ajax({
            url:'api/ward/'+id,
            type:"GET",
            success:function (data){
               $("#name").val(data.name);
               $("#ward_id").val(id);
               loader.remove();
            }
          });
      }
      function deleteWard(id){
        if(confirm("Bạn có chắc muốn xóa xã này!!")){
          var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
          $('body').append(loader);
          $.ajax({
              url:'api/ward/delete/'+id,
              type:"POST",
              success:function (data){
                  location.reload();
              }
          });
        }
      }
    </script>
@endsection