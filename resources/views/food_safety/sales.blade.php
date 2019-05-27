@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/vendor/intl-phone/css/intlTelInput.css">
    <link rel="stylesheet" href="{{ asset('css/separate/elements/player.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/pages/profile-2.min.css')}}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="/vendor/intl-phone/js/intlTelInput.min.js"></script>
    <script src="/js/call.js"></script>
@endsection
@section('content')
    <input type="hidden" id="user_id" value="{{Auth::id()}}">
    <div class="page-content1 col-md-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <aside class="profile-side" style="margin-top: 0">
                        <section class="box-typical profile-side-stat p-3">
                            <img src="{{ asset('img/avatar-2-64.png')}}" alt="" width="40">
                            <span style="font-size: 18px">{{$contact->name}}</span>
                        </section>

                        <section class="box-typical box-typical-padding">
                            <header class="box-typical-header-sm bordered">About {{$contact->name}}</header>
                            <div class="box-typical-inner">
                               
                                <div id='infoContact'>
                                     <!-- <h5 class="text-primary">About {{$contact->name}}</h5> -->
                                    <span class="text-muted">Name</span>
                                    <p id='nameText'>{{$contact->name}}</p>
                                    <span class="text-muted">Email</span>
                                    <p id='emailText'>{{$contact->email}}</p>
                                    <span class="text-muted">Phone</span>
                                    <p id='phoneText'>{{$contact->phone}}</p>
                                    <span class="text-muted">Thông tin</span>
                                    <p id='addressText'>{{$contact->address}}</p>
                                    <span class="text-muted">Ghi chú</span>
                                    <p>{{$contact->note()}}</p>
                                    <p class="text-center">
                                        <a onclick='infoUpdateView()' class="mt-2 btn btn-rounded btn-default-outline text-primary">Chỉnh sửa</a></p>
                                </div>
                                <div id='infoUpdateView' style="display: none;">
                                    <span class="text-muted">Name</span>
                                    <p><input type="text" id='infoName' class="form-control" value="{{$contact->name}}"></p>
                                    <span class="text-muted">Email</span>
                                    <p><input type="text" id='infoEmail' class="form-control" value="{{$contact->email}}"></p>
                                    <span class="text-muted">Phone</span>
                                    <p><input type="text" id='infoPhone' class="form-control" value="{{$contact->phone}}"></p>
                                    <span class="text-muted">Address</span>
                                    <p><input type="text" id='infoAddress' class="form-control" value="{{$contact->address}}"></p>
                                    <p class="text-center">
                                        <a onclick='infoUpdate()' class="mt-2 btn btn-rounded btn-default-outline text-primary">Cập nhật</a></p>
                                </div>
                            </div>
                        </section>
                        <input type="hidden" id="contact_id" value="{{$contact->id}}">
                        <section class="box-typical box-typical-padding">
                            <header class="box-typical-header-sm bordered">Công ty</header>
                            <div class="box-typical-inner1">
                                    <div id='companyInfo'>
                                        @if($contact->company())
                                        <p class="p-2"><a href="/sales/company/detail/{{$contact->company()->id}}">{{$contact->company()->name}}</a></p>
                                        
                                        @endif
                                    </div>
                                    <div id="divBtn" class="text-center">
                                        <a onclick='themCompanyView()' class="btn btn-rounded btn-default-outline text-primary mt-2">Thêm</a>
                                        <a class="text-primary call-overlay btn btn-rounded btn-default-outline mt-2" data-overlay="company" id='createCompanyBtn' onclick="createCompanyView()">Tạo mới</a>            
                                    </div>

                                    <div id='themCompanyView' style="display: none">
                                        <select class="select2 form-control" id="company_id" name="company_id">
                                            @foreach($companies as $value)
                                                <option value="{{$value->id}}" 
                                                    @if($contact->company()&&$value->id==$contact->company()->id) selected @endif>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-center">
                                            <a onclick='themCompany()' class="btn btn-rounded btn-default-outline text-primary mt-2">Chọn</a>
                                            <a onclick='themCompanyCancel()' class="btn btn-rounded btn-default-outline text-danger mt-2" >Hủy</a>
                                            
                                        </p>
                                    </div>
                            </div>
                        </section>

                        <section class="box-typical box-typical-padding">
                            <header class="box-typical-header-sm bordered">Hợp đồng</header>
                            <div class="box-typical-inner">
                                <div id='contract_list'>
                                    @foreach($contact->contracts() as $contract)
                                        <p class="pb-2"><a class="text-info" href="/sales/contract/{{$contract->id}}/show">
                                            {{$contract->name}}</a></p>
                                    @endforeach
                                </div>
                                <div id='select_contract_view' style="display: none;">
                                    <select class="select2 form-control" id="contract_id" name="company_id">
                                        @foreach($contracts as $value)
                                            <option value="{{$value->id}}" 
                                                >{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-center text-primary">
                                        <a class="btn btn-rounded btn-default-outline mt-2" onclick='select_contract()'>Chọn</a>
                                        <a onclick="select_cancel()" class="mt-2 btn btn-rounded btn-default-outline text-danger">Hủy</a>
                                       
                                    </p>
                                </div>
                                <div id='divBtn1' class="text-center">
                                    <a class='btn btn-rounded btn-default-outline text-primary' onclick="select_contract_view()">Thêm</a>
                                    <a class="text-primary btn btn-rounded btn-default-outline call-overlay" data-overlay="contract">Tạo mới</a>
                                </div>
                                
                            </div>
                        </section>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <section class="tabs-section">
                        <div class="tabs-section-nav tabs-section-nav-left">
                            <ul class="nav" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                        <span class="nav-link-in">Email</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                        <span class="nav-link-in">Ghi chú</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                        <span class="nav-link-in">Gọi điện thoại</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                        <span class="nav-link-in">Công việc</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs-2-tab-5" role="tab" data-toggle="tab">
                                        <span class="nav-link-in">Lịch hẹn</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!--.tabs-section-nav-->

                        <div class="tab-content no-styled profile-tabs">
                            <div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
                                <div class="box-typical">
                                <form action="{{route('send_mail_contact')}}" class="box-typical-section" method="post">
                                    {{csrf_field()}}
                                <div class="box-typical p-3">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="py-3"><b>To</b> {{$contact->email}}</div>
                                    <input type="hidden" name="contact_id" value="{{$contact->id}}">
                                    <b>Chọn mẫu email</b>
                                    <select class="form-control" id='template_email' onchange="get_template_email($(this).val())">
                                        @foreach($template_emails as $key => $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="email" value="{{$contact->email}}">
                                     <input type="hidden" name="name" value="{{$contact->name}}">
                                    <div class="py-3"><b>Subject</b> <input type="text" id='subject' name="subject" class="form-control"></div>
                                    <textarea type="text" rows="20" 
                                     class="write-something form-control" id='content' name="content" placeholder="Nội dung mail"></textarea>
                                    
                                    <section class="box-typical-section profile-settings-btns">
                                            <button type="submit" class="btn btn-rounded">Gửi</button>
                                            <button type="button" id="cancel_task" class="btn btn-rounded btn-grey">Hủy</button>
                                    </section>
                                    
                                </form>
                                </div>
                                </div>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane" id="tabs-2-tab-2">
                                <div class="box-typical">
                                <form class="box-typical-section" method="post" action="{{route('lead_update_note')}}">
                                    {{csrf_field()}}

                                    <textarea type="text" rows="9" name="note" 
                                     class="write-something form-control"
                                     placeholder="Tạo một ghi chú mới"></textarea>
                                    <input type="hidden" name="contact_id" value="{{$contact->id}}">
                                    
                                    <section class="box-typical-section profile-settings-btns">
                                            <button type="submit" class="btn btn-rounded">Ghi chú</button>
                                            <button type="button" id="cancel_task" class="btn btn-rounded btn-grey">Hủy</button>
                                    </section>
                                </form>
                            </div><!--.box-typical-->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tabs-2-tab-4">
                                <div class="box-typical">
                                <form class="box-typical-section" method="post" action="{{route('contact.store_task')}}">
                                    {{csrf_field()}}
                                    <input type="text" name="name" placeholder="Tên công việc" class="form-control">
                                    <textarea type="text" rows="9" name="description" 
                                     class="write-something form-control"
                                     placeholder="Mô tả công việc"></textarea>
                                     <div class="row">
                                        <div class="form-group col-md-3">
                                        <label class="form-label" for="exampleError2">Người nhận</label>
                                        <div class="form-control-wrapper">
                                            <select class="select2 form-control" id="owner" name="owner">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="typeSelect" class="form-label">Trang thái</label>
                                        <div class="form-control-wrapper">
                                            <select id="statusSelect" name="status" class="form-control">
                                                    <option value="todo">Todo</option>
                                                    <option value="doing">Doing</option>
                                                    <option value="review">Review</option>
                                                    <option value="done">Done</option>  
                                            </select>
                                           
                                        </div>
                                        </div>
                                     </div>

                                    <input type="hidden" name="contact_id" value="{{$contact->id}}">
                                   
                                    <section class="box-typical-section profile-settings-btns">
                                            <button type="submit" class="btn btn-rounded">Tạo công việc</button>
                                            <button type="button" id="cancel_task" class="btn btn-rounded btn-grey">Hủy</button>
                                    </section>
                                    
                                </form>
                                </div>
                                <!--.box-typical-->
                            </div>

                            <div role="tabpanel" class="tab-pane" id="tabs-2-tab-5">
                                <div class="box-typical">
                                <form class="box-typical-section" method="post" action="{{route('contact.store_task')}}">
                                    {{csrf_field()}}
                                    <input type="text" name="name" placeholder="Hẹn khi nào gặp?" class="form-control">
                                    <textarea type="text" rows="9" name="description" 
                                     class="write-something form-control"
                                     placeholder="Mô tả cuộc hẹn"></textarea>
                                     <div class="row">
                                        <div class="form-group col-md-3">
                                        <label class="form-label" for="exampleError2">Người tham dự</label>
                                        <div class="form-control-wrapper">
                                            <select class="select2 form-control" id="owner" name="owner">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label" for="exampleError2">Thêm liên hệ</label>
                                            <div class="form-control-wrapper">
                                                <select id="statusSelect" name="status" class="form-control">
                                                        <option value="todo">Todo</option>
                                                        <option value="doing">Doing</option>
                                                        <option value="review">Review</option>
                                                        <option value="done">Done</option>  
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="typeSelect" class="form-label">Thời lượng</label>
                                            <div class="form-control-wrapper">
                                                <select id="statusSelect" name="status" class="form-control">
                                                        <option value="todo">Todo</option>
                                                        <option value="doing">Doing</option>
                                                        <option value="review">Review</option>
                                                        <option value="done">Done</option>  
                                                </select>
                                               
                                            </div>
                                        </div>
                                     </div>

                                    <input type="hidden" name="contact_id" value="{{$contact->id}}">
                              
                                    <section class="box-typical-section profile-settings-btns">
                                            <button type="submit" class="btn btn-rounded">Lưu</button>
                                            <button type="button" id="cancel_task" class="btn btn-rounded btn-grey">Thoát</button>
                                    </section>
                                   
                                </form>
                                </div>
                                <!--.box-typical-->
                            </div>

                            <div role="tabpanel" class="tab-pane" id="tabs-2-tab-3">
                                <div class="box-typical">
                                <form id="contactForm" class="box-typical-section" role="form">
                                     <div class="box-typical p-3">
                                        <div class="form-group">
                                            <h3>Gọi điện thoại <i class="fa fa-phone" aria-hidden="true"></i></h3>
                                            <p class="help-block">
                                                Gọi dễ dàng và bán hàng nhanh chóng với Salesflow!
                                            </p>
                                        </div>
                                        <label>Gọi đến</label>
                                        <div class="form-group">
                                           <input class="form-control" type="text" value="+84 93 575 51 17" name="userPhone" id="userPhone"
                                                  placeholder="+(84) 1234567890">
                                        </div>
                                        <label>Số điện thoại của bạn</label>
                                        <div class="form-group">
                                           <input class="form-control" type="tel" value="+84 90 5531717" name="salesPhone" id="salesPhone"
                                                  placeholder="+(84) 1234567890">
                                         </div>
                                        <button type="submit" class="btn btn-default">
                                            Gọi ngay!
                                        </button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div><!--.tab-content-->
                    </section><!--.tabs-section-->
                    <div class="">
                    <h5>Activity</h5>
                    @foreach($activities as $value)
                        <div class="box-typical p-3">
                            {{$value->created_at}}<br>
                            {!! $value->content() !!}
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
<div class="outside-overlay company">
    <div class="overlay">
        <div class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>TẠO MỚI CÔNG TY</h3>
                    <ol class="buttons">
                        <span class="font-icon font-icon-del overlay-close"></span>
                    </ol>
                </div>
            </div>
        </div>
        </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-typical box-typical-padding col-sm-12">
        <div class="form-group row">
     
            <div class="col-sm-2">
                <button class='btn ' onclick="createCompany()">Thêm</button>
            </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Tên công ty</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="name" type="text" class="form-control" 
                      id="name" required>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Phone</label>
                <div class="col-sm-8 form-group pt-2" data-autoclose="true">
                   <p class="form-control-static">
                    <input name="date" value="" id="phone" type="text" class="form-control" >
                  </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Địa chỉ</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="name" type="text" class="form-control" 
                      id="address" required>
                    </p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 form-control-label pt-3">Email</label>
                <div class="col-sm-8 form-group">
                    <p class="form-control-static">
                      <input name="name" type="email" class="form-control" 
                      id="email" required>
                    </p>
                </div>
                <input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
            </div>
        </div>
    </div>
</div>
</div>

<div class="outside-overlay contract">
    <div class="overlay">
        <div class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3 class="p-3">TẠO MỚI HỢP ĐỒNG</h3>
                    <ol class="buttons">
                        <a class="font-icon font-icon-del overlay-close" onclick='$("#taomoihopdongView").css("display","none")'></a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-typical box-typical-padding col-sm-12">
        <div class="form-group row">
            <div class="col-sm-2">
                <button class='btn ' onclick="create_contract()">Thêm</button>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label class="form-label">Tên hợp đồng</label>
                        <div class="form-control-wrapper">
                            <input type="text" class="form-control" id="inputNameContract1" 
                            placeholder="Tên hợp đồng">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleError2">Doanh số</label>
                        <div class="form-control-wrapper">
                            <input name="expected_sales" type="text" class="form-control"
                            id="inputSaleContract1" placeholder="Doanh số mong chờ" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleError2">Trạng thái</label>
                        <div class="form-control-wrapper">
                        
                            <select class="select2 form-control" id="inputStatus1" name="status">
                                <option>Đã liên hệ</option>
                                <option>Quyết định mua</option>
                                <option>Gởi hợp đồng</option>
                                <option>Chốt - Hủy</option>
                                <option>Chốt - Hoàn tất</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">

        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/lib/html5-form-validation/jquery.validation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/moment/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{ asset('js/lib/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/contact.js')}}"></script>
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
        CKEDITOR.replace('content',{
            filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html',
            height: '200px',
        });

        get_template_email('{{$template_emails[0]->id}}');
        function get_template_email(id){
            $.ajax({
                url:'/api/template_email/'+id,
                type:'GET',
                success:function(data){
                    $("#subject").val(data.subject);
                    var content = data.content.replace('src="','src="http://workplace.novaio.vn').replace('.pdf', '.pdf?asset_id=' + "{{$contact->id}}");
                    CKEDITOR.instances.content.setData(content);
                }
            })
        }

    </script>
@endsection

