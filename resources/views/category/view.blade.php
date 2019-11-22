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
            <div class="bootstrap-table-header mt-2">Quản lí nhóm</div>
                <a href="#" class="btn call-overlay" data-overlay="contact"><i class="fa fa-plus"></i>Thêm 1 nhóm</a>
        </div>
        <div class="table-responsive" id="project-uid" data-uid="all">
            <table id="table" class="table table-bordered mt-3">
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Tên viết tắt</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td><a onclick="editCategory('{{$category->id}}')"><i class="glyphicon glyphicon-edit"></i></a></td>
                        <td><a onclick="deleteCategory('{{$category->id}}')"><i class="glyphicon glyphicon-remove"></i></a></td>
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
    <!-- <form id="contact-form"> -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-typical box-typical-padding col-sm-12">
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Tên nhóm</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="name" type="text" class="form-control" 
                      id="name" required>
                    </p>
                </div>
            </div>
            <input type="hidden" id="category_id" value="0">
            <div class="form-group row">
              <div class="col-sm-10">
                  <button class='btn ' onclick="createCategory()">Thêm / Cập nhật</button>
                  <button class='btn btn-danger overlay-close'>Thoát</button>
              </div>
            </div>
        </div>
      <!-- </form> -->
    </div>
    </div><!--Overlay-->
    </div><!--Outside Overlay-->
      
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        function detailFormatter(index, row) {
            var html = [];
            $.each(row, function (key, value) {
                html.push('<p><b>' + key + ':</b> ' + value + '</p>');
            });
            return html.join('');
        }
    </script>

    <script>

  $('.overlay-close').click(function(){
      location.reload();
  });
  function createCategory(){
    if($("#name").val()==''){
      $(".alert").removeClass('hidden');
      $(".alert").addClass('alert-warning');
      $(".alert").removeClass('alert-aquamarine');
      $(".alert").text('Tên thôn không được để trống ');
      $("#name").focus();
      $('html, body').animate({
            scrollTop: $("#top1").offset().top
        }, 100);
    } else{
      var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
      $('body').append(loader);
      $.ajax({
        url:'api/category_store',
        type:"POST",
        data: {
            name:$("#name").val(),
            parent_id:$("#parent_id").val(),
            category_id:$("#category_id").val(),
            hierarchy: "{{Auth::user()->role == 12?'hql':'ward'}}"
        },
        success:function (data){
          location.reload();
        }
      });
    }
  }


  function editCategory(id){
    $(".outside-overlay").css('display','block');
    $(".overlay").css('display','block');
    var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
    $('body').append(loader);
    $.ajax({
        url:'api/category/'+id,
        type:"GET",
        success:function (data){
            $("#name").val(data.name);
            $("#category_id").val(data.id);
            loader.remove()
        }
    });
  }

  function deleteCategory(id){
    if(confirm("Bạn có chắc muốn xóa nhóm này!!")){
      var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
      $('body').append(loader);
      $.ajax({
          url:'api/category/delete/'+id,
          type:"POST",
          success:function (data){
              location.reload();
          }
      });
    }
  }
</script>
@endsection