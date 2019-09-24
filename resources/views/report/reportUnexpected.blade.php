@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<style>
  
</style>
<div class="col-md-12">
  <input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
	<div class="section-header w-100">
		<div class="tbl">
			<div class="tbl-row">
				<div class="tbl-cell">
					<h3 class="w-100 mb-5">Food Safety / Báo Cáo</h3>
          <h4>Kiểm tra theo đợt</h4>
				</div>
			</div>
		</div>
	</div>

  <div class="row p-4">
    <div class="col-md-3">
     <p>Chọn ngày bắt đầu</p>
     <input type="date" name="startDate" class="form-control">
    </div>

    <div class="col-md-3">
      <p>Chọn ngày kết thúc</p>
      <input type="date" name="endDate"  class="form-control">
    </div>
    <div class="col-md-2">
      <p>&nbsp;</p>
      <a class="btn btn-primary" onclick="reportByDate()">Kiểm tra</a>
    </div>
  </div>

  <div class="row p-3">
    <div id="data-render" class="text-center row mx-0"
       >
    </div>
  </div>
</div>     
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        function reportByDate(){
          var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
          $('body').append(loader);
          $.ajax({
            url:"/api/reportByDate",
            type:"GET",
            data:{
              startDate:$("[name=startDate]").val(),
              endDate:$("[name=endDate]").val()
            },
            success:function(data){
              $("#data-render").empty();
              var divCol6 = $("<div class='col-md-12'></div>");
              var table = $("<table class='table my-4' style='' id='table-report-by-date'>");
              divCol6.append(table);

              var thead = $("<tr></tr>");
              table.append(thead);
              $("#data-render").append(divCol6);
              $.each(data.wards, function(j, ward){
                var tr = $(`<tr><td>`+j+`</td></tr>`);
                table.append(tr);
                thead.empty();
                thead.append("<td style='width:100px'>"+dateFormatByString($("[name=startDate]").val())+"<br>~<br>"+
                  dateFormatByString($("[name=endDate]").val())+"</td>");
                $.each(ward, function(k, cateData){
                  var check = cateData.split("/")[0];
                  var rating1 = 0;
                  var categoryCount = parseInt(data.fsInChildOfCategory[k+j])
                  if(categoryCount>0) rating1 = check/categoryCount*100;
                  rating1 = Math.round(rating1/100)*100;
                  tr.append("<td class='count_"+convertToSlug(k)+"_"+convertToSlug(j)+"'>"+cateData+"<br>("+data.fsInChildOfCategory[k+j]+"/"+rating1+"%)</td>");
                  thead.append("<td>"+k+"</td>")
                });
              });
              loader.remove();
            }
          });
        }
    </script>
@endsection