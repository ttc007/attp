@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<input type="hidden" name="" id='app_id' value="{{\Session::get('app_id')}}">


<div class="section-header w-100">
	<div class="tbl">
		<div class="tbl-row">
			<div class="tbl-cell">
				<h3 class="w-100 mb-5">Kênh thông tin</h3>
          <div class="col-md-6">
            @foreach ($posts as $post)
              <div class="card mt-4 p-2">
                <b style="color:#1275af">{{$post->author}}</b> 
                <span class="text-muted"  style="display: inline;">
                  {{$post->created_at->diffForHumans()}}
                </span>
                <p>{{$post->text}}</p>
                @if($post->type=="Video")
                  <video src="/upload/{{$post->src}}" controls style="width: 100%">
                    <p>Trình duyệt không hổ trợ HTML5 video. Đây là <a href="/upload/{{$post->src}}">link đến file video</a></p> 
                  </video>
                @else
                  <img class="w-100" src="/upload/{{$post->src}}">
                @endif
            </div>
            @endforeach
            @if(count($posts)==0)
              <p>Không có gì để hiển thị</p>
              <div  class="text-right mt-4">
                <a href="/communication" class="text-right mt-4">Quay về</a>
              </div>
            @else
              <div  class="text-right mt-4">
                <a href="?offset={{Request::get('offset')+10}}" class="text-right mt-4">Cũ hơn</a>
              </div>
            @endif
          </div>
			</div>
		</div>
	</div>
</div>
             
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    <script>
        
    </script>

@endsection