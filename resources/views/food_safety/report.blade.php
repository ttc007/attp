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
              <h4>Báo cáo của <b id="wardName">{{$ward->name}}</b></h4>
						</div>
					</div>
				</div>
			</div>
      <div class="row p-4">
        <div class="col-md-2">
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
        </div>
        </div>
        <div id="data-render" class="py-5 text-center">
          <table class="table" id='table-report-month'>
            <tbody id="table"></tbody>
          </table>
          <a class="btn" onclick="ExportToExcel('table-report-month')" 
            style="display: none" id='btn-report-excel'>Xuất Excel</a>
        </div>
      </div>
      
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        $("#month_report").change(function(){
          var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
          $('body').append(loader);
          var month = $(this).val();
          $.ajax({
            url:'/api/month_report/'+$(this).val(),
            type:'GET',
            data:{
              ward_id:$("#ward_id").val(),
              year:$("#GLOBAL_YEAR").val()
            },
            success:function(data){
              $("#btn-report-excel").css("display", 'block');
              $("#table").empty();
              var thead = $(`<tr></tr>`);
              $("#table").append(thead);
              
              for(var i=1; i<=month; i++){
                var tr = $("<tr><td>Tháng "+i+"</td></tr>");
                thead.empty();
                thead.append("<td><b>"+$("#wardName").text()+"</b></td>");
                
                $.each(data.categories, function(m, category){
                  var check = 0;
                  var pass = 0;
                  var rating = 0;
                  var rating1 = 0;
                  thead.append("<td>"+category.name+"</td>");
                  
                  $.each(data.foodSafetyDateCheckeds, function(m, foodSafetyDateChecked){
                    if(foodSafetyDateChecked.categoryb2_id==category.id){
                      if(foodSafetyDateChecked.ngay_xac_nhan_hien_thuc){
                        var dateCheckMonth = foodSafetyDateChecked.ngay_xac_nhan_hien_thuc.split("-")[1];
                        if(dateCheckMonth==i){
                          check++;
                          if(foodSafetyDateChecked.ket_qua_kiem_tra_1=="Đạt"){
                            pass++;
                          }
                        }
                      }
                      if(foodSafetyDateChecked.ngay_kiem_tra_2){
                        var dateCheckMonth = foodSafetyDateChecked.ngay_kiem_tra_2.split("-")[1];
                        if(dateCheckMonth==i){
                          check++;
                          if(foodSafetyDateChecked.ket_qua_kiem_tra_2=="Đạt"){
                            pass++;
                          }
                        }
                      }
                      if(foodSafetyDateChecked.ngay_kiem_tra_3){
                        var dateCheckMonth = foodSafetyDateChecked.ngay_kiem_tra_3.split("-")[1];
                        if(dateCheckMonth==i){
                          check++;
                          if(foodSafetyDateChecked.ket_qua_kiem_tra_3=="Đạt"){
                            pass++;
                          }
                        }
                      }
                    }
                  });

                  if(check>0) rating = (pass/check*100);
                  rating = Math.round(rating * 100) / 100;

                  var categoryCount = parseInt(data.fsInChildOfCategory[category.name]);
                  if(categoryCount>0) rating1 = (check/categoryCount*100);
                  rating1 = Math.round(rating1 * 100) / 100;

                  var cateData = check+"/"+pass+"/"+rating+"%";
                  tr.append("<td class='count_"+convertToSlug(category.name)+"'>"+cateData+"<br>("+data.fsInChildOfCategory[category.name]+"/"+rating1+"%)</td>");
                });
                $("#table").append(tr);
                if(i==3||i==6||i==9||i==12){
                  var quy = "Quý " +(i/3);
                  if(i==12) quy = "Quý 4 - cả năm";
                  var bg = "#2ec";
                  // if(i==6) bg = "#8bdaa3";
                  // if(i==9) bg = "#d5e484";
                  // if(i==12) bg = "#e2927a";
                  var tr = $("<tr style='background:"+bg+"'><td> "+quy+"</td></tr>");
                  
                  $.each(data.fsInChildOfCategory, function(cateName, cateCount){
                    var checkQuarter = 0;
                    var passQuarter = 0;
                    var total = 0;
                    var rating = 0;
                    $('.count_'+convertToSlug(cateName)).each(function (h,k){
                      checkQuarter +=parseInt($(k).text());
                      passQuarter +=parseInt($(k).text().split("/")[1]);
                      total = parseInt($(k).text().split("(")[1]);
                    });
                    var rating = 0;
                    if(checkQuarter>0) rating = (passQuarter/checkQuarter*100);
                    rating = Math.round(rating * 100) / 100;

                    var rating1 = 0;
                    if(total>0) rating1 = checkQuarter/total*100;
                    rating1 = Math.round(rating1 * 100) / 100;
                    var viewCount = checkQuarter+"/"+passQuarter+"/"+rating
                      +"%<br>("+total+"/"+rating1+"%)";
                    tr.append('<td>'+viewCount+'</td>');
                  });
                  
                  
                  $("#table").append(tr);
                }
              }
              loader.remove();
            }
          });
        });
    </script>

@endsection