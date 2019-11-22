@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<style>
  
</style>
<input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">
<div class="section-header">
	<div class="tbl">
		<div class="tbl-row">
			<div class="tbl-cell">
				<h3>Food Safety / Upfile</h3>
			</div>
		</div>
	</div>
</div>
<section class="box-typical col-sm-12 p-5">
    <p class="text-muted">Chọn 1 tệp danh sách excel rồi thêm vào</p>
    <form method="post" action="upfile_csv" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="file" class="form-control w-25 ">
        <button class="btn mt-3">Up</button>
    </form>
</section>

<section class="w-100">
    <hr>
    <p>Bạn có thể download file excel mẫu tại đây.</p>
    <a href="download_csv" class="btn btn-warning">Download excel cơ sở</a>
    <a href="download_checked_csv" class="btn btn-warning">Download excel kiểm tra</a>
    <a href="download_no_checked_csv" class="btn btn-warning">Download excel cơ sở chưa kiểm tra</a>
</section>
@endsection

@section('script')
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-export.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/tableExport.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-food-safety.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>

@endsection