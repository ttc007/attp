@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>

<div class="col-md-12 mt-4">
  <input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
	<div class="section-header w-100">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h3 class="w-100 mb-5">Food Safety / Báo Cáo</h3>
          <h4>Báo cáo tổng hợp</h4>
          
				</div>
			</div>
		</div>
	</div>

  <div class="row p-4">
    <!-- <button onclick='report()' class="pull-left btn btn-primary mr-4">Xem báo cáo quý</button> -->
    <button onclick="ExportToExcel('table')" style="display: block;" class="pull-left btn btn-info mr-4" id="btn-export">Xuất excel</button>
  </div>

  <div class="row p-3">
    <div id="data-render" class="text-center row mx-0">
      <table class="table mx-2" id="table">
        <tr><td colspan=""></td></tr>
      </table>
    </div>
  </div>
</div>     
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        function report() {
            var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
            $('body').append(loader);
            $.ajax({
              url:'../api/month_report_master/12',
              type:'GET',
              data:{
                year:$("#GLOBAL_YEAR").val()
              },
              success:function(data){
                $("#table").empty();
                for(var i = 0; i < data.wards.length; i++){
                  var ward = data.wards[i];
                  if (ward.id < 12) {
                    var categories_general = data.categories;
                    var colspan = 7;
                  } else {
                    var categories_general = data.hql_categories;
                    var colspan = 11;
                  }
                  var trHead = $('<tr><td>' + ward.name + '</td></tr>');
                  for (var k = 0; k < categories_general.length; k++) {
                    trHead.append('<td>' + categories_general[k].name + '</td>');
                  }
                  $("#table").append(trHead);

                  for (var j = 1; j <= 4; j++) {
                    var tr = $('<tr><td>Quý' + j + '</td></tr>');
                    for (var k = 0; k < categories_general.length; k++) {
                      var category = categories_general[k];
                      var check = 0;
                      var pass = 0;
                      var total = data.fsInChildOfCategory[ward.id][category.name];
                      for(var m = 0; m < data.data.length; m++) {
                        var add = true;
                        if (data.data[m].month > j*3) add = false;
                        else if (data.data[m + 1] && data.data[m + 1].month <= j*3 && data.data[m].food_safety_id == data.data[m].food_safety_id) add = false;
                        if (data.data[m].categoryb2_id != category.id || data.data[m].ward_id != ward.id) add = false;
                        if (add) {
                          check++;
                          if(data.data[m].result == 'Đạt') pass++;
                        }
                      }
                      var rating = check > 0 ? Math.round(pass / check * 100) : 0;
                      var rating1 = total > 0 ? Math.round(check / total * 100) : 0;
                      tr.append('<td>' + check +'/' + pass + '/' + rating + '%<br>(' + total + '/' + rating1 + '%)</td>');
                    }
                    $("#table").append(tr);
                  }
                }
                loader.remove();
              }
            });
        }
        report();
    </script>

@endsection