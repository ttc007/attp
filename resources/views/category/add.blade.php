@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>

@endsection
@section('content')
	<div class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>TẠO MỚI LIÊN HỆ</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">Bán hàng</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                        <li class="active">Tạo mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-typical box-typical-padding col-sm-12">
        <div class="form-group row">
            <div class="col-sm-10">
                <div class="alert alert-aquamarine alert-fill alert-close alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Thông báo</strong><br>
                    Công việc phân bổ theo KPI và nhiệm vụ được giao tại "Nhiệm vụ" hoặc nhiệm vụ được giao thông qua Group chat.<br>
                Báo cáo công việc vào thứ 6 hàng tuần, chậm nhất là sáng thứ 2 trước 8h30.
                </div>
                
            </div>
            <div class="col-sm-2">
                <button class='btn ' onclick="createContact()">Thêm</button>
            </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Tên công ty / khách hàng</label>
                <div class="col-sm-6 form-group">
                    <p class="form-control-static">
                    	<input name="name" type="text" class="form-control" 
                    	id="name" required>
                    </p>
                </div>

                <label class="col-sm-1 form-control-label pt-3">Phone</label>
                <div class="col-sm-3 form-group pt-2" data-autoclose="true">
                    <input name="date" value="" id="phone" type="text" class="form-control" >
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Địa chỉ</label>
                <div class="col-sm-6 form-group">
                    <p class="form-control-static">
                    	<input name="name" type="text" class="form-control" 
                    	id="address" required>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Email</label>
                <div class="col-sm-6 form-group">
                    <p class="form-control-static">
                    	<input name="name" type="email" class="form-control" 
                    	id="email" required>
                    </p>
                </div>
                
            </div>
            <input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
        </div>
    </div>
<script>
	function createContact(){
		if($("#name").val()==''){
			$(".alert").removeClass('hidden');
			$(".alert").addClass('alert-warning');
			$(".alert").removeClass('alert-aquamarine');
			$(".alert").text('Tên contact không được để trống ');
			$("#name").focus();
			$('html, body').animate({
		        scrollTop: $("#top1").offset().top
		    }, 100);
		} else{
			$.ajax({
				url:'/api/contact/',
				type:"POST",
				data:{
					name:$("#name").val(),
					phone:$("#phone").val(),
					address:$("#address").val(),
					email:$("#email").val(),
                    app_id:$("#app_id").val()
				},
				success:function (data){
					window.location = '/sales/contact';
				}
			});
		}
	}
</script>
@endsection


	<!-- <script src="{{asset('js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script> -->
@section('script')
    <script src="{{ asset('js/lib/html5-form-validation/jquery.validation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/moment/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{ asset('js/lib/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script>
        $(function() {
            $('#daterange2').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
            $('#form-work').validate({
                submit: {
                    settings: {
                        inputContainer: '.form-group',
                        errorListClass: 'form-tooltip-error'
                    }
                }
            });
        });
    </script>
@endsection

