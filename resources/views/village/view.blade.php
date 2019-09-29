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
        <div id="toolbar" class="mt-3">
            <div class="bootstrap-table-header">Quản lí Thôn xã</div>
                <a href="#" class="btn call-overlay" data-overlay="contact"><i class="fa fa-plus"></i>Thêm 1 thôn</a>
        </div>
        <div class="table-responsive" id="project-uid" data-uid="all">
            <table id="table" class="table table-striped table-bordered my-4">
              <tr>
                <th>Stt</th>
                <th>Tên</th>
                <th>Tên viết tắt</th>
                <th>Chỉnh sửa</th>
                <th>Xóa</th>
              </tr>
              @foreach($villages as $key => $village)
                  <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$village->name}}</td>
                      <td>{{$village->slug}}</td>
                      <td><a onclick="editVillage('{{$village->id}}')"><i class="glyphicon glyphicon-edit"></i></a></td>
                      <td><a onclick="deleteVillage('{{$village->id}}')"><i class="glyphicon glyphicon-remove"></i></a></td>
                  </tr>
              @endforeach
            </table>
        </div>
    </section>

    <div class="outside-overlay contact">
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
            <label class="col-sm-2 form-control-label pt-3">Tên thôn</label>
            <div class="col-sm-8 form-group">
                <p class="form-control-static">
                  <input name="name" type="text" class="form-control" 
                  id="name" required>
                </p>
            </div>
        </div>
        <input type="hidden" id="village_id" value="0">
        <div class="form-group row">
          <div class="col-sm-10">
              <button class='btn ' onclick="createVillage()">Thêm / Update</button>
              <button class='btn btn-danger overlay-close'>Thoát</button>
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
      function createVillage(){
          $.ajax({
            url:'api/village',
            type:"POST",
            data: {
                name:$("#name").val(),
                village_id:$("#village_id").val(),
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

      function editVillage(id){
          $(".outside-overlay").css('display','block');
          $(".overlay").css('display','block');
          $.ajax({
            url:'api/village/'+id,
            type:"GET",
            success:function (data){
               $("#name").val(data.name);
               $("#village_id").val(id);
            }
          });
      }

  </script>
@endsection