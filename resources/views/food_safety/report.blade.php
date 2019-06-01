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
          <table class="table" >
            <tbody id="table"></tbody>
          </table>
        </div>
      </div>
      
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        $("#month_report").change(function(){
          $.ajax({
            url:'/api/month_report/'+$(this).val(),
            type:'GET',
            data:{
              ward_id:$("#ward_id").val(),
              year:$("#GLOBAL_YEAR").val()
            },
            success:function(response){
              // console.log(response);
              var t=0;
              $("#table").empty();
              $.each(response.cate,function(i,v){
                if(i==1){
                  var title = "";
                  $.each(v,function(j,k){
                    title += '<th>'+j+'</th>';
                  });
                  $("#table").append(`
                    <tr>
                      <th>Tháng</th>
                      `+title+`
                    </tr>
                  `);
                }
                var data ='';
                t=0;
                $.each(v,function(j,k){
                  t++;
                  data += '<td class="count_'+t+'" >'+k+
                    '('+response.fsInChildOfCategory[j+$("#wardName").text()]+')'+'</td>';
                });
                $("#table").append(`
                  <tr>
                    <td>`+i+`</td>
                    `+data+`
                  </tr>
                `);
                if(i==3||i==6||i==9||i==12){
                  var quy = "Quý " +(i/3);
                  if(i==12) quy = "Quý 4 - cả năm";
                  var tr = $("<tr style='background:#2ec'><td> "+quy+"</td></tr>");
                  for (var i =1; i <= t; i++) {
                    var tong3 = 0;
                    var count = 0;
                    var total = 0;
                    $('.count_'+i).each(function (h,k){
                      tong3 +=parseInt($(k).text());
                      count +=parseInt($(k).text().split("/")[1]);
                      total = parseInt($(k).text().split("(")[1]);
                    });
                    var rating = 0;
                    if(tong3>0) rating = (count/tong3*100);
                    rating = Math.round(rating * 100) / 100;
                    var viewCount = tong3+"/"+count+"/"+rating+"%"+"("+
                    total
                    +")";
                    tr.append('<td>'+viewCount+'</td>');
                  }
                  $("table").append(tr);
                }
              });
            }
          });
        });
    </script>

@endsection