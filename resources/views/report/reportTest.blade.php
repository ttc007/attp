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
							<h3 class="w-100 mb-5">Food Safety / Báo Cáo Test</h3>
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
          <div class="text-left py-3">
            <a class="btn" onclick="ExportToExcel('table-report-month')" 
            style="display: none" id='btn-report-excel'>Xuất Excel</a>
          </div>
          
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
            url:'/api/month_report_test/'+$(this).val(),
            type:'GET',
            data:{
              ward_id:$("#ward_id").val(),
              year:$("#GLOBAL_YEAR").val()
            },
            success:function(data){
              $("#btn-report-excel").css("display", 'inline-block');
              $("#table").empty();
              var thead = $(`<tr></tr>`);
              var testArr = data.tests;
              $("#table").append(thead);
              
              for(var i=1; i<=month; i++){
                var tr = $("<tr><td>Tháng "+i+"</td></tr>");
                thead.empty();
                thead.append("<td><b>"+$("#wardName").text()+"</b></td>");
                
                $.each(testArr, function(testId, testItem){
                  var total = 0;
                  var negative = 0;
                  var positive = 0;
                  var negativeRating = 0;
                  var positiveRating = 0;
                  thead.append("<td>"+testItem+"</td>");
                  
                  $.each(data.foodSafetyDateCheckeds, function(m, foodSafetyDateChecked){
                    var dateCheckMonth = foodSafetyDateChecked.month;
                    if(dateCheckMonth.charAt(0)=='0'){
                      dateCheckMonth = dateCheckMonth.substring(1,2);
                      dateCheckMonth = parseInt(dateCheckMonth);
                    }
                    if(dateCheckMonth==i&&foodSafetyDateChecked.test_id==testId){
                      total++;
                      if(foodSafetyDateChecked.result=="Âm tính") negative++;
                      if(foodSafetyDateChecked.result=="Dương tính") positive++;
                    }
                  });

                  if(total>0) {
                    negativeRating = (negative/total*100);
                    negativeRating = Math.round(negativeRating * 100) / 100;

                    positiveRating = (positive/total*100);
                    positiveRating = Math.round(positiveRating * 100) / 100;
                  }

                  var cateData = total+"/"+negative+
                      "/"+positive+
                      "<br>("+negativeRating+"%/"
                      +positiveRating+"%)";
                  tr.append("<td class='count_"+convertToSlug(testItem)+"'>"+cateData+"</td>");
                });
                $("#table").append(tr);
                if(i==3||i==6||i==9||i==12){
                  var quy = "Quý " +(i/3);
                  if(i==12) quy = "Quý 4 - cả năm";
                  var bg = "#22eecc3d";
                  var tr = $("<tr style='background:"+bg+"'><td> "+quy+"</td></tr>");
                  
                  $.each(testArr, function(t, testItem){
                    var total = 0;
                    var negative = 0;
                    var positive = 0;
                    var negativeRating = 0;
                    var positiveRating = 0;
                    $('.count_'+convertToSlug(testItem)).each(function (h,k){
                      total +=parseInt($(k).text());
                      negative +=parseInt($(k).text().split("/")[1]);
                      positive += parseInt($(k).text().split("/")[2]);
                    });
                    var rating = 0;
                    if(total>0) {
                      negativeRating = (negative/total*100);
                      negativeRating = Math.round(negativeRating * 100) / 100;
                      positiveRating = (positive/total*100);
                      positiveRating = Math.round(positiveRating * 100) / 100;
                    }

                    var cateData = total+"/"+negative+
                      "/"+positive+
                      "<br>("+
                      negativeRating+"%/"
                      +positiveRating+"%)";
                    tr.append("<td>"+cateData+"</td>");
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