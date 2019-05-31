@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<style>
  
</style>
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
         <h4>Chọn năm</h4>
         <select class="form-control" style="width:100px;display:inline-block" id="GLOBAL_YEAR">
            <option>2018</option>
            <option selected>2019</option>
            <option>2020</option>
          </select>
      </div>
      <div class="row py-2 col-md-12">
        <h3>Chọn tháng</h3>
        <select class="form-control" id="month_report">
            @for($i=1;$i<=12;$i++)
              <option>{{$i}}</option>
            @endfor
        </select>
      </div>
      <div class="row p-3">
        
        <div id="data-render" class="text-center row mx-0"
           style="margin-left: -30px!important">
        </div>
      </div>
      
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        $("#month_report").change(function(){
          $.ajax({
            url:'/api/month_report_master/'+$(this).val(),
            type:'GET',
            data:{
              year:$("#GLOBAL_YEAR").val()
            },
            success:function(data){
              console.log(data);
              $("#data-render").empty();
              $.each(data, function(i, wardList){
                var divCol6 = $("<div class='col-md-12'></div>");
                var table = $("<table class='table my-4' style=''>");
                divCol6.append(table);

                var thead = $("<tr></tr>");
                table.append(thead);
                $("#data-render").append(divCol6);
                $.each(wardList, function(j, ward){
                  var tr = $(`<tr><td>`+j+`</td></tr>`);
                  table.append(tr);
                  thead.empty();
                  thead.append("<td><b> Tháng "+i+"</b></td>");
                  $.each(ward, function(k, cateData){
                    tr.append("<td class='count_"+convertToSlug(k)+"_"+convertToSlug(j)+"'>"+cateData+"("+data.fsInChildOfCategory[k]+")</td>");
                    thead.append("<td>"+k+"</td>")
                  });
                });


                if(i==3||i==6||i==9||i==12){
                  var divCol6 = $("<div class='col-md-12'></div>");
                  var bg = "#cae2f1";
                  if(i==6) bg = "#8bdaa3";
                  if(i==9) bg = "#d5e484";
                  if(i==12) bg = "#e2927a"
                  var table = $(`<table class='table my-4' 
                    style='background:`+bg+`'>`);
                  divCol6.append(table);
                  $("#data-render").append(divCol6);
                  var thead = $("<tr></tr>");
                  table.append(thead);
                  $.each(wardList, function(j, ward){
                    var tr = $(`<tr><td>`+j+`</td></tr>`);
                    table.append(tr);
                    thead.empty();
                    thead.append("<td><b> Quý "+(i==12?' 4 - cả năm':(i/3))+"</b></td>");
                    $.each(ward, function(k, cateData){
                      var tong = 0;
                      var count = 0;
                      $.each($(".count_"+convertToSlug(k)+"_"+convertToSlug(j)) , function(m, objEle){
                        tong+= parseInt($(objEle).text());
                        count+= parseInt($(objEle).text().split("/")[1]);
                      });
                      var rating = 0;
                      if(tong>0) rating = (count/tong*100);
                      rating = Math.round(rating * 100) / 100;
                      var viewCount = tong+"/"+count+"/"+rating+"%"+"("+data.fsInChildOfCategory[k]+")";
                      tr.append("<td class='total_"+convertToSlug(k)+"_"+convertToSlug(j)+"'>"+viewCount+"</td>");
                      thead.append("<td>"+k+"</td>")
                    });
                  });
                }
              }); 
            }
          });
        });

        function convertToSlug(Text)
        {
          return Text
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
            ;
        }
    </script>

@endsection