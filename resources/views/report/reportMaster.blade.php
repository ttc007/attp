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
    <button onclick='report()' class="pull-left btn btn-primary mr-4">Xem báo cáo quý</button>
    <button onclick="ExportToExcel('table')" style="display: none;" class="pull-left btn btn-info mr-4" id="btn-export">Xuất excel</button>
          <!-- <a href='reportMasterExport' class="pull-left btn btn-danger">Xuất excel</a> -->
    <!-- <div class="col-md-2">
     <p>Chọn năm</p>
     <select class="form-control" style="width:100px;display:inline-block" id="GLOBAL_YEAR">
        <option>2018</option>
        <option selected>2019</option>
        <option>2020</option>
      </select>
    </div>

    <div class="col-md-2">
      <p>Chọn tháng</p>
      <select class="form-control" id="month_report">
          @for($i=1;$i<=12;$i++)
            <option>{{$i}}</option>
          @endfor
      </select>
    </div> -->
  </div>

  <div class="row p-3">
    <div id="data-render" class="text-center row mx-0">
      <table class="table mx-2" id="table"></table>
    </div>
  </div>
</div>     
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        $("#month_report1").change(function(){
          var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
          $('body').append(loader);

          var month = $(this).val();
          $.ajax({
            url:'../api/month_report_master/'+$(this).val(),
            type:'GET',
            data:{
              year:$("#GLOBAL_YEAR").val()
            },
            success:function(data){
              $("#data-render").empty();
              for (var i = 1; i <= month; i++) {
                var divCol6 = $("<div class='col-md-12'></div>");
                var table = $("<table class='table mt-4' style=''>");
                divCol6.append(table);

                var thead = $("<tr></tr>");
                table.append(thead);
                $("#data-render").append(divCol6);
                $.each(data.wards, function(j, ward){
                  if(ward.name != "Huyện quản lí"){
                    var tr = $(`<tr><td>`+ward.name+`</td></tr>`);
                    table.append(tr);
                    thead.empty();
                    thead.append("<td><b> Tháng "+i+"</b></td>");
                    $.each(data.categories, function(k, category){
                      var cateData = "";
                      var check = 0;
                      var pass = 0;
                      var rating = 0;
                      var rating1 = 0;
                      $.each(data.foodSafetyDateCheckeds, function(m, foodSafetyDateChecked){
                        if(foodSafetyDateChecked.categoryb2_id==category.id
                          &&foodSafetyDateChecked.ward_id==ward.id){
                          if(foodSafetyDateChecked.dateChecked){
                            var dateCheckMonth = foodSafetyDateChecked.month;
                            if(dateCheckMonth.charAt(0)=='0'){
                              dateCheckMonth = dateCheckMonth.substring(1,2);
                              dateCheckMonth = parseInt(dateCheckMonth);
                            }
                            if(dateCheckMonth==i){
                              check++;
                              if(foodSafetyDateChecked.result=="Đạt"){
                                pass++;
                              }
                            }
                          }
                        }
                      });
                      if(check>0) rating = (pass/check*100);
                      rating = Math.round(rating * 100) / 100;
                      cateData = check+"/"+pass+"/"+rating+"%";

                      var categoryCount = parseInt(data.fsInChildOfCategory[category.name+ward.name]);
                      if(categoryCount>0) rating1 = (check/categoryCount*100);
                      rating1 = Math.round(rating1 * 100) / 100;

                      tr.append("<td class='count_"+convertToSlug(category.name)+"_"+convertToSlug(ward.name)+"'>"+cateData+"<br>("+data.fsInChildOfCategory[category.name+ward.name]+"/"+rating1+"%)</td>");
                      thead.append("<td>"+category.name+"</td>")
                    });
                  } else {
                    var divCol6Hql = $("<div class='col-md-12'></div>");
                    var tableHql = $("<table class='table my-1' style=''>");
                    divCol6Hql.append(tableHql);
                    $("#data-render").append(divCol6Hql);

                    var theadHql = $("<tr><td><b> Tháng "+i+"</b></td></tr>");
                    tableHql.append(theadHql);
                    
                    var tr = $(`<tr><td>`+ward.name+`</td></tr>`);
                    tableHql.append(tr);

                    $.each(data.hql_categories, function(k, category){
                      var cateData = "";
                      var check = 0;
                      var pass = 0;
                      var rating = 0;
                      var rating1 = 0;
                      $.each(data.foodSafetyDateCheckeds, function(m, foodSafetyDateChecked){
                        if(foodSafetyDateChecked.categoryb2_id==category.id
                          &&foodSafetyDateChecked.ward_id==ward.id){
                          if(foodSafetyDateChecked.dateChecked){
                            var dateCheckMonth = foodSafetyDateChecked.month;
                            if(dateCheckMonth.charAt(0)=='0'){
                              dateCheckMonth = dateCheckMonth.substring(1,2);
                              dateCheckMonth = parseInt(dateCheckMonth);
                            }
                            if(dateCheckMonth==i){
                              check++;
                              if(foodSafetyDateChecked.result=="Đạt"){
                                pass++;
                              }
                            }
                          }
                        }
                      });
                      if(check>0) rating = (pass/check*100);
                      rating = Math.round(rating * 100) / 100;
                      cateData = check+"/"+pass+"/"+rating+"%";

                      var categoryCount = parseInt(data.fsInChildOfCategory[category.name+ward.name]);
                      if(categoryCount>0) rating1 = (check/categoryCount*100);
                      rating1 = Math.round(rating1 * 100) / 100;

                      tr.append("<td class='count_"+convertToSlug(category.name)+"_"+convertToSlug(ward.name)+"'>"+cateData+"<br>("+data.fsInChildOfCategory[category.name+ward.name]+"/"+rating1+"%)</td>");
                      theadHql.append("<td>"+category.name+"</td>")
                    });
                  }
                  
                });


                if(i==3||i==6||i==9||i==12){
                  var divCol6 = $("<div class='col-md-12'></div>");
                  var bg = "#cae2f1";
                  if(i==6) bg = "#8bdaa3";
                  if(i==9) bg = "#d5e484";
                  if(i==12) bg = "#e2927a";
                  var table = $(`<table class='table my-4' 
                    style='background:`+bg+`'>`);
                  divCol6.append(table);
                  $("#data-render").append(divCol6);
                  var thead = $("<tr></tr>");
                  table.append(thead);
                  $.each(data.wards, function(j, ward){
                    var tr = $(`<tr><td>`+ward.name+`</td></tr>`);
                    table.append(tr);
                    thead.empty();
                    thead.append("<td><b> Quý "+(i==12?' 4 - cả năm':(i/3))+"</b></td>");
                    $.each(data.categories, function(k, category){
                      var tong = 0;
                      var count = 0;
                      $.each($(".count_"+convertToSlug(category.name)+"_"+convertToSlug(ward.name)) , function(m, objEle){
                        tong+= parseInt($(objEle).text());
                        count+= parseInt($(objEle).text().split("/")[1]);
                      });
                      var rating = 0;
                      if(tong>0) rating = (count/tong*100);
                      rating = Math.round(rating * 100) / 100;

                      var rating1 = 0;
                      var categoryCount = parseInt(data.fsInChildOfCategory[category.name+ward.name]);
                      if(categoryCount>0) rating1 = (tong/categoryCount*100);
                      rating1 = Math.round(rating1 * 100) / 100;

                      var viewCount = tong+"/"+count+"/"+rating+"%"+"<br>("+data.fsInChildOfCategory[category.name+ward.name]+"/"+rating1+"%)";
                      tr.append("<td class='total_"+convertToSlug(category.name)+"_"
                          +convertToSlug(ward.name)+"'>"+viewCount+"</td>");
                      thead.append("<td>"+category.name+"</td>")
                    });
                  });
                }
              }
              loader.remove();
            }
          });
        });
        
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
                $.each(data, function(i, quart){
                  $("#table").append("<tr><td colspan='10'>" + i + "</td></tr>");
                  $.each(quart, function(j, dataQuart){
                    if (j == 'Quý 1') {
                      var tr1 = $("<tr>");
                      tr1.append("<td style='width:100px'></td>");
                      $.each(dataQuart.category, function(c, category){
                        tr1.append("<td>"+category+"</td>");
                      });
                      $("#table").append(tr1);
                    }

                    var tr2 = $("<tr>");
                    tr2.append("<td>"+j+"</td>");
                    $.each(dataQuart.count, function(d, count){
                        tr2.append("<td>"+count+"</td>");
                      });
                      $("#table").append(tr2);
                  });
                });
                $("#btn-export").css('display', 'block');
                loader.remove();
              }
            });
        }
    </script>

@endsection