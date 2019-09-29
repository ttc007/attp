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
                    <h3>UPDATE </h3>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-typical box-typical-padding col-sm-12">
        <div class="form-group row">
            <div class="col-sm-10">
                
            </div>
            <div class="col-sm-2">
                <button class='btn ' onclick="updateContact()">Cập nhật</button>
            </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Tên công ty / khách hàng</label>
                <div class="col-sm-6 form-group">
                    <p class="form-control-static">
                    	<input name="name" type="text" class="form-control" value="{{$contact->name}}" 
                    	id="name" required>
                    </p>
                </div>

                <label class="col-sm-1 form-control-label pt-3">Phone</label>
                <div class="col-sm-3 form-group pt-2" data-autoclose="true">
                    <input name="date" id="phone" type="text" class="form-control" value="{{$contact->phone}}" >
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Địa chỉ</label>
                <div class="col-sm-6 form-group">
                    <p class="form-control-static">
                    	<input name="name" type="text" class="form-control" 
                    	id="address" required value="{{$contact->address}}">
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Email</label>
                <div class="col-sm-6 form-group">
                    <p class="form-control-static">
                    	<input name="name" type="email" class="form-control" 
                    	id="email" required value="{{$contact->email}}">
                    </p>
                </div>
                
            </div>
            <input type="hidden" name="" value="{{$contact->id}}" id='contactId'>
            <input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
        </div>
    </div>
<script>
	function updateContact(){
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
				url:'/api/contact/'+$("#contactId").val(),
				type:"PUT",
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

