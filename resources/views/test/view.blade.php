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
        <div id="toolbar">
            <div class="bootstrap-table-header">Quản lí test nhanh</div>
                <a href="{{ route('contact.add') }}" class="btn call-overlay" data-overlay="contact"><i class="fa fa-plus"></i>Thêm 1 test nhanh</a>
        </div>
        <div class="table-responsive" id="project-uid" data-uid="all">
            <table id="table" 
               class="table table-striped mt-3"
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
               data-page-size="20"
               data-show-footer="false"
               data-response-handler="responseHandler">
               <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Action</th>
               </tr>
               <tbody id='tbody'></tbody>
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
                <label class="col-sm-3 form-control-label pt-3">Tên test nhanh</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="name" type="text" class="form-control" 
                      id="name" required>
                    </p>
                </div>
            </div>
            <input type="hidden" id="test_id" value="0">
            <div class="form-group row">
              <div class="col-sm-10">
                  <button class='btn ' onclick="createContact()">Thêm / Update</button>
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
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-export.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/tableExport.min.js')}}"></script>
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
      $.ajax({
        url:"/api/test",
        type:"GET",
        success:function(data){
          $("#tbody").empty();
          $.each(data, function(i, test){
            $("#tbody").append(`<tr>
                <td>`+test.id+`</td>
                <td>`+test.name+`</td>
                <td>`+
                  '<a class="like" onclick="edit('+test.id+')" title="Edit">'+
                  '<i class="glyphicon glyphicon-edit"></i>'+
                  '</a>  '+
                  '<a class="remove" href="javascript:void(0)" title="Remove">'+
                  '<i class="glyphicon glyphicon-remove"></i>'+
                  '</a>'+
                `</td>
              </tr>`)
          });
        }
      });
      $('.overlay-close').click(function(){
          $(".outside-overlay").css("display", "none");
      });
      function createContact(){
          $.ajax({
            url:'/api/test',
            type:"POST",
            data: {
                name:$("#name").val(),
                test_id:$("#test_id").val()
            },
            success:function (data){
              console.log(data);
                swal({
                  title:'Success!',
                  text:'Thêm mới thành công',
                  type:'success'
                }).then(function(){
                    // $("#name").val("");
                    // $(".outside-overlay").css('display','block');
                    location.reload();
                });
            }
          });
      }

      function edit(id){
          $(".outside-overlay").css('display','block');
          $(".overlay").css('display','block');
          $.ajax({
            url:'/api/test/'+id,
            type:"GET",
            success:function (data){
               console.log(data);
               $("#name").val(data.name);
               $("#test_id").val(id);
            }
          });
      }

    </script>
@endsection