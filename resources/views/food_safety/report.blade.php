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
              <h4>Báo cáo của xã <b>{{$ward->name}}</b></h4>
						</div>
					</div>
				</div>
			</div>
             
      <div class="row p-5">
         <h4>Chọn năm</h4><select class="form-control" style="width:100px;display:inline-block" id="GLOBAL_YEAR">
                                        <option>2018</option>
                                        <option selected>2019</option>
                                        <option>2020</option>
                                </select>
      </div>
      <div class="row p-5">
  	<h3>Chọn tháng</h3>
        <select class="form-control" id="month_report">
            @for($i=1;$i<=12;$i++)
              <option>{{$i}}</option>
            @endfor
        </select>
        <div id="data-render" class="py-5 text-center">
          <table class="table" >
            <tbody id="table"></tbody>
            <tr id='tr_tong'>
              <td>Tổng</td>
            </tr>
          </table>
        </div>
      </div>
      
@endsection

@section('script')
    <!-- <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-export.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/tableExport.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-food-safety.js')}}"></script> -->
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
            success:function(data){
               console.log(data);
               console.log($("#ward_id").val());
              var t=0;
              $("#table").empty();
              $.each(data,function(i,v){
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
                  data += '<td class="count_'+t+'" >'+k+'</td>';
                });
                $("#table").append(`
                  <tr>
                    <td>`+i+`</td>
                    `+data+`
                  </tr>
                `);
              });
              $("#tr_tong").empty();
              $("#tr_tong").append(`<td>Tổng</td>`);
              for (var i =1; i <= t; i++) {
                // console.log($('.count_'+i));
                var tong2 = 0;
                $('.count_'+i).each(function (h,k){
                  // console.log(h);
                  // console.log(k);
                  tong2 +=parseInt($(k).text());
                });
                $("#tr_tong").append('<td>'+tong2+'</td>');
              }
            }
          });
        });
    </script>

@endsection