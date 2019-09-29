@extends('master')
@section('content')
			<div class="box-typical box-typical-padding col-sm-12 p-0" id='top1'>
				<div class="section-header py-0" style="background: #85b5d9">
					<a href="/project/{{$project->id}}" class="pull-right text-warning">Update</a>
								<h5 class="text-white p-3 text-uppercase text-center">CÔNG TRÌNH <b>{{$project->name}}</b></h5>
								<h6 class="text-center text-white" id='status'>{{$project->status}}</h6>
								<script>
									var status = '{{$project->status}}';
									if(status=='Chưa thực hiện')$("#status").addClass('bg-danger');
									if(status=='Đang thực hiện')$("#status").addClass('bg-success');
									if(status=='Đã hoàn thành')$("#status").addClass('bg-warning');
								</script>
				</div>
				<div class="px-5 pt-5 pb-4 " style="background: #fafafa">
					<div class="alert alert-danger hidden " id='alert1'>
					</div>
					<!-- <form action="/project/store" method="POST" enctype="multipart/form-data"> -->
						@if(session()->has('message'))
							<div class="alert alert-success alert-fill alert-close alert-dismissible fade show" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								{{ session()->get('message') }}
							</div>
						@endif

						<div class="text-center pb-4">
						  <h4 class="text-center">Chủ dự án <b>{{$contact->name}}</b></h4>
						</div>
						<input type="hidden" name="" value="{{$project->id}}" id='project_id'>
						  	<div id='nvtg' style="border-top: 1px solid #d0d0f0;border-bottom: 1px solid #d0d0f0" class="p-3 row text-center mx-auto">
						  		@foreach($nhanviens as $nhanvien)
						  			<div class="col-41 px-2"><img src="../../img/avatar-1-128.png" style="width: 30px">{{$nhanvien->name}}</div>
						  		@endforeach
						  	</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<h4 class="px-4 pt-5">Update file hoặc thông báo cho các thành viên khác</h4>
						<div class="leave-comment-block">
							<div class="avatar-preview avatar-preview-32">
								<img src="../../img/avatar-1-128.png" style="width: 30px">
							</div>
							<div class="summernote-theme-1">
								<textarea class="form-control w-75" rows="8"></textarea>
							</div>
								<div class="viewable-access">
									<div class="btn-group choose">
										<button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="font-icon font-icon-lock"></i>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-lock"></i>Action</a>
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-lock"></i>Another action</a>
										</div>
									</div>
									<div class="lbl">Viewable by All Users</div>
								</div>

								<div class="chat-area-bottom">
									<button type="submit" class="btn btn-rounded float-left">Send</button>
									<button type="reset" class="btn btn-rounded btn-default float-left">Clear</button>
									<div class="dropdown dropdown-typical dropup attach">
										<a class="px-5 text-primary">
											<span class="lbl">Attach</span>
										</a>
										<input type="file" name="" style="display: none;">
										<script>
											
										</script>
									</div>
								</div><!--.chat-area-bottom-->
							</div><!--.leave-comment-block-->
						</section><!--.proj-page-attach-section-->
					</section><!--.proj-page-->
				</div>
				</div>
			</div><!--.box-typical-->
			<!-- </form> -->
<script>
	function storeProject(){
		if($("#name").val()==''){
			$(".alert").removeClass('hidden');
			$(".alert").append('Tên công trình không được để trống ');
			$("#name").focus();
			$('html, body').animate({
		        scrollTop: $("#top1").offset().top
		    }, 100);
		} else{
			var status = $('input[name=status]:checked').val();
			console.log(status);
			$.ajax({
				url:'../api/project',
				type:"POST",
				data:{
					name:$("#name").val(),
					contact:$("#contact").val(),
					status:status
				},
				success:function (data){
					console.log(data);
					window.location = '/project';
				}
			});
		}
		
	}

	function changeStage(){
		$("#divStage").css('display','block');
		$("#changeState").css('display','none');
		$("#divStage1").empty();
		$.ajax({
			url:'../api/projectStage',
				type:"GET",
				success:function (data){
					$.each(data,function(i,v){
						$("#divStage1").append(
							`<tr>
								<td>
									<a onclick='selectStage("`+v.name+` - Số tiền ứng: `+v.advance_money+` - Ngày: `+
									v.date+`",`+v.id+`)' class='hover1 p-2'>`+v.name+` - Số tiền ứng: `+v.advance_money+` - Ngày: `+v.date+`</a></td>
								<td>
									<a onclick="editStage(`+v.id+`,'`+v.name+`','`+v.advance_money+`','`+v.date+`')" class='text-muted'>Edit</a>
								</td>
								</tr>`);
					});
				}
		})
	}
	function addStage(){
		swal({
			title:'Thêm giai đoạn',
			html:`
				<input type='text' id='stageName' class='form-control' placeholder="Tên giai đoạn">
				<input type='text' id='stageMoney' class='form-control' placeholder="Số tiền ứng">
				<br>Ngày<input type='date' id='stageDate' class='form-control'>
			`,
			showCancelButton: true,
		}).then(function(){
			$.ajax({
				url:'../api/projectStage',
				type:'POST',
				data:{
					name:$("#stageName").val(),
					advance_money:$("#stageMoney").val(),
					date:$("#stageDate").val(),
					project_id:$("#project_id").val()
				},
				success:function(data){
					var v=data;
					selectStage(v.name+` - Số tiền ứng: `+v.advance_money+` - Ngày: `+v.date);
				}
			});
		});
	}

	function selectStage(value,id){
		$("#stage").val(value);
		$("#divStage").css('display','none');
		$("#changeState").css('display','block');
		$.ajax({
			url:'../api/updateStage',
			type:'POST',
			data:{
				project_id:$("#project_id").val(),
				stage_id:id,
			},
			success:function(data){
				console.log(data);
			}
		});
	}

	$(document).on("click", function (e) {
	    if ($(e.target).is("#changeState")) {
	        console.log('ok');
	    } else {
	        $("#divStage").css('display','none');
	        $("#changeState").css('display','block');
	    }
	});

	function editStage(id,name,money,date){
		swal({
			title:'Edit giai đoạn',
			html:`
				<input type='text' id='stageName' class='form-control' value='`+name+`' placeholder="Tên giai đoạn">
				<input type='text' id='stageMoney' class='form-control'value='`+money+`' placeholder="Số tiền ứng">
				<br>Ngày<input type='date' id='stageDate' class='form-control' value='`+date+`'>
			`,
			showCancelButton: true,
		}).then(function(){
			$.ajax({
					url:'../api/projectStage/'+id,
					type:'PUT',
					data:{
						name:$("#stageName").val(),
						advance_money:$("#stageMoney").val(),
						date:$("#stageDate").val(),
						project_id:$("#project_id").val()
					},
					success:function(data){
						var v=data;
						selectStage(v.name+` - Số tiền ứng: `+v.advance_money+` - Ngày: `+v.date);
					}
				});
		});
	}
</script>
@endsection

