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
					<h3 class="w-100 mb-5">Food Safety / Báo Cáo Test </h3>
          <h4>Báo cáo Test tổng hợp</h4>
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

  <div class="row p-3">
    <div id="data-render" class="text-center row mx-0"
       style="margin-left: -30px!important">
    </div>
  </div>
</div>     
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        $("#month_report").change(function(){
          var month = $(this).val();
          $.ajax({
            url:'/api/month_report_test_master/'+$(this).val(),
            type:'GET',
            data:{
              year:$("#GLOBAL_YEAR").val()
            },
            success:function(data){
              $("#data-render").empty();
              var testArr = ["Hàn the", "Formol", "Độ ôi khét dầu mỡ", 
                "Độ sạch bát đĩa", "Độ sạch tiếp xúc thực phẩm"];
              for (var i = 1; i <= month; i++) {
                var divCol6 = $("<div class='col-md-12'></div>");
                var table = $("<table class='table my-4' style=''>");
                divCol6.append(table);

                var thead = $("<tr></tr>");
                table.append(thead);
                $("#data-render").append(divCol6);
                $.each(data.wards, function(j, ward){
                  var tr = $(`<tr><td>`+ward.name+`</td></tr>`);
                  table.append(tr);
                  thead.empty();
                  thead.append("<td><b> Tháng "+i+"</b></td>");
                  $.each(testArr, function(k, testItem){
                    var cateData = "";
                    var total = 0;
                    var negative = 0;
                    var positive = 0;
                    var negativeRating = 0;
                    var positiveRating = 0;
                    $.each(data.foodSafetyDateCheckeds, function(m, foodSafetyDateChecked){
                      if(foodSafetyDateChecked.ward_id==ward.id){
                        if(foodSafetyDateChecked.ngay_xac_nhan_hien_thuc){
                          var dateCheckMonth = foodSafetyDateChecked.ngay_xac_nhan_hien_thuc.split("-")[1];
                          if(dateCheckMonth==i){
                            var test_1 = foodSafetyDateChecked.test_1;
                            if(test_1){
                              $.each(test_1.split("<br>"), function(t,test){
                                if(test){
                                  if(test.split(":")[0]==testItem&&
                                    test.split(":")[1]!="Không kiểm tra"){
                                    total++;
                                    if(test.split(":")[1]=="Âm tính") negative++;
                                    if(test.split(":")[1]=="Dương tính") positive++;
                                  }
                                }
                              });
                            }
                          }
                        }
                        if(foodSafetyDateChecked.ngay_kiem_tra_2){
                          var dateCheckMonth = foodSafetyDateChecked.ngay_kiem_tra_2.split("-")[1];
                          if(dateCheckMonth==i){
                            var test_2 = foodSafetyDateChecked.test_2;
                            if(test_2){
                              $.each(test_2.split("<br>"), function(t,test){
                                if(test){
                                  if(test.split(":")[0]==testItem&&
                                    test.split(":")[1]!="Không kiểm tra"){
                                    total++;
                                    if(test.split(":")[1]=="Âm tính") negative++;
                                    if(test.split(":")[1]=="Dương tính") positive++;
                                  }
                                }
                              });
                            }
                          }
                        }
                        if(foodSafetyDateChecked.ngay_kiem_tra_3){
                          var dateCheckMonth = foodSafetyDateChecked.ngay_kiem_tra_3.split("-")[1];
                          if(dateCheckMonth==i){
                            var test_3 = foodSafetyDateChecked.test_3;
                            if(test_3){
                              $.each(test_3.split("<br>"), function(t,test){
                                if(test){
                                  if(test.split(":")[0]==testItem&&
                                    test.split(":")[1]!="Không kiểm tra"){
                                    total++;
                                    if(test.split(":")[1]=="Âm tính") negative++;
                                    if(test.split(":")[1]=="Dương tính") positive++;
                                  }
                                }
                              });
                            }
                          }
                        }
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
                    thead.append("<td>"+testItem+"</td>")
                  });
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
                    $.each(testArr, function(k, testItem){
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
                      thead.append("<td>"+testItem+"</td>")
                    });
                  });
                }
              }
            }
          });
        });

    </script>

@endsection