<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>WorkPlace</title>
       <link href="{{asset('img/novaio.svg')}}" rel="icon" type="image/png">
      <!-- Fonts -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Arimo|Roboto|Roboto+Slab" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/theme.css')}}">

   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark p-0">
            <a class="navbar-brand" href="#"><img class="w-25" src="{{asset('img/novaio.svg')}}"> SALESFLOW</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Sản phẩm <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Khách hàng</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Mua ngay</a>
                  </li>
               </ul>
               
               <div class="mt-2 mt-md-0">
                  @if (Route::has('login'))
               <div class="top-right links">
                  @auth
                  <a class="btn btn-primary p-4 rounded-0 text-white" href="{{ url('/sales') }}">Bảng điều khiển</a>
                  @else
                  <a class="btn btn-success p-4 rounded-0 text-white" href="{{ route('login') }}">Đăng nhập</a>
                  <a class="btn btn-primary p-4 rounded-0 text-white" href="{{ route('register') }}">Yêu cầu dùng thử</a>
                  @endauth
               </div>
               @endif
               </div>
            </div>
         </nav>
      </header>
      <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="{{asset('img/working-in-office.jpg')}}" alt="First slide">
               <div class="container">
                  <div class="carousel-caption text-left">
                     <h1>Cảnh tượng trước mắt chúng tôi thực sự hùng vĩ.</h1>
                     <p>Màn sương màu bạc tràn ngập khắp boong tàu. Mặt trăng đã khuất bóng.</p>
                     <p><a class="btn btn-lg btn-primary" href="#" role="button">Yêu cầu dùng thử</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- START THE FEATURETTES -->
    
      <div class="featurette bg-blue text-white p-5">
         <div class="container">
            <div class="row">
               <div class="col-md-7 pr-md-5">
                  <h2 class="featurette-heading pt-5">
                     <span class="text-uppercase text-sub font-weight-light">Giọng nói ở đầu kia</span>
                     <span class="text-heading mt-4">Khi màn sương tan, con tàu đã rời cảng ba tiếng.</span>
                  </h2>
                  <p class="lead font-weight-light pt-3">Bầu trời trong xanh thăm thẳm, không một gợn mây. Đó là cuộc hành trình trở về trong cô đơn.</p>
               </div>
               <div class="col-md-5 pl-md-5">
                  <img class="featurette-image img-fluid mx-auto" src="{{asset('img/customer-service.svg')}}" alt="Generic placeholder image">
               </div>
            </div>
         </div>
      </div>
      
      <div class="featurette p-5">
         <div class="container">
            <div class="row">
               <div class="col-md-7 order-md-2 pl-5">
                  <h2 class="featurette-heading pt-md-5"><span class="text-uppercase text-sub font-weight-light">Đó chỉ là vấn đề thời gian.</span><span class="text-heading mt-4">Vừa lúc biết điều đó, chúng tôi đã rời khỏi mặt đất.</span></h2>
                  <p class="lead font-weight-light pt-3">Tôi ngắm nhìn cơn bão, quá đẹp nhưng thật hãi hùng.</p>
               </div>
               <div class="col-md-5 order-md-1 pr-md-5">
                  <img class="featurette-image img-fluid mx-auto" src="{{asset('img/teamwork.svg')}}"  alt="Generic placeholder image">
               </div>
            </div>
         </div>
      </div>
    
      <div class="featurette bg-grey p-5">
         <div class="container">
            <div class="row">
               <div class="col-md-7 pr-md-5">
                  <h2 class="featurette-heading pt-md-5"> <span class="text-uppercase text-sub font-weight-light">Giọng nói ở đầu kia</span>
                     <span class="text-heading mt-4">Khi màn sương tan, con tàu đã rời cảng ba tiếng.</span></h2>
                  <p class="lead pt-3">Bầu trời trong xanh thăm thẳm, không một gợn mây. Đó là cuộc hành trình trở về trong cô đơn.</p>
               </div>
               <div class="col-md-5 pl-md-5">
                  <img class="featurette-image img-fluid mx-auto" src="{{asset('img/unique-customer.svg')}}"  alt="Generic placeholder image">
               </div>
            </div>
         </div>
      </div>
      
      <div class="featurette text-center">
       
               <div class="cover-container d-flex w-100 h-100 p-5 mx-auto flex-column">
                  <h2 class="featurette-heading pt-5">And lastly, this one. <span class="text-muted">Đó chỉ là vấn đề thời gian.</span></h2>
                  <p class="lead font-weight-light pt-3">Tôi ngắm nhìn cơn bão, quá đẹp nhưng thật hãi hùng.</p>
               </div>
            
      </div>
      <div class="featurette text-center bg-blue text-white  w-100 h-100 p-5">
         <div class="container">
            <div class="row mt-md-5 mb-md-5">
               <div class="col-md-4">
                  <blockquote class="blockquote text-center">
                     <p class="mb-0">Lửa tắt, anh dõi theo những vì sao qua cửa sổ.</p>
                     <footer class="blockquote-footer">Sundar Pichai <cite title="Source Title">google inc</cite></footer>
                  </blockquote>
               </div>
               <div class="col-md-4">
                  <blockquote class="blockquote text-center">
                     <p class="mb-0">Mọi thiết bị và dụng cụ đều đang hoạt động.</p>
                     <footer class="blockquote-footer">Mark Zuckerberg <cite title="Source Title">facebook</cite></footer>
                  </blockquote>
               </div>
               <div class="col-md-4">
                  <blockquote class="blockquote text-center">
                     <p class="mb-0">Trái đất như hình lưỡi liềm sáng rực bên dưới tàu bay.</p>
                     <footer class="blockquote-footer">Jeff Bezos <cite title="Source Title">amazon</cite></footer>
                  </blockquote>
               </div>
            </div>
         </div>
      </div>
      <!-- /END THE FEATURETTES -->
      <div class="text-center bg-dark bg-cover" style="background-image: url({{asset('img/businesswoman.jpg')}})">
         <div class="cover-container d-flex w-100 h-100 p-5 mx-auto flex-column">
            <div role="cover" class="inner cover text-white m-md-5">
               <h1 class="cover-heading">Khi màn sương tan</h1>
               <p class="lead">Bầu trời trong xanh thăm thẳm, không một gợn mây. Đó là cuộc hành trình trở về trong cô đơn. Mọi thiết bị và dụng cụ đều đang hoạt động</p>
               <p class="lead">
                  <a href="#" class="btn btn-lg btn-secondary">Yêu cầu dùng thử</a>
                  <a href="#" class="btn btn-lg btn-primary">Mua ngay</a>
               </p>
            </div>
         </div>
      </div>
      </div><!-- /.container -->
      <!-- FOOTER -->
      <footer class="container py-5 black">
         <div class="row">
            <div class="col-12 col-md">
               <img width="50" src="{{asset('img/novaio.svg')}}">
               <small class="d-block mb-3 text-muted">by Novaio</small>
            </div>
            <div class="col-6 col-md">
               <h5>Tính năng</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Quản lý Liên hệ</a></li>
                  <li><a class="text-muted" href="#">Bán hàng - Pipeline</a></li>
                  <li><a class="text-muted" href="#">Các hoạt động</a></li>
                  <li><a class="text-muted" href="#">Email mẫu</a></li>
                  <li><a class="text-muted" href="#">Tài liệu</a></li>
                  <li><a class="text-muted" href="#">Theo dõi thông tin</a></li>
                  <li><a class="text-muted" href="#">Quản lý công việc</a></li>
                  <li><a class="text-muted" href="#">Lịch hẹn</a></li>
                  <li><a class="text-muted" href="#">Ghi chú</a></li>
                  <li><a class="text-muted" href="#">Nhắc nhỡ</a></li>
                  <li><a class="text-muted" href="#">Công cụ marketing</a></li>
               </ul>
            </div>
            <div class="col-6 col-md">
               <h5>Dùng phần mềm</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Yêu cầu dùng thử</a></li>
                  <li><a class="text-muted" href="#">Mua phần mềm</a></li>
                  <li><a class="text-muted" href="#">Bảng giá</a></li>
                  <li><a class="text-muted" href="#"></a></li>
               </ul>
            </div>
            <div class="col-6 col-md">
               <h5>Thông tin</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Tiếp thị tự động</a></li>
                  <li><a class="text-muted" href="#">Phiễu trong tiếp thị</a></li>
                  <li><a class="text-muted" href="#">Khách hàng</a></li>
               </ul>
            </div>
            <div class="col-6 col-md">
               <h5>Tại sao SF?</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Miễn phí CRM</a></li>
                  <li><a class="text-muted" href="#">Bảo mật thông tin</a></li>
                  <li><a class="text-muted" href="#">Đối tác tin cậy</a></li>
                  <li><a class="text-muted" href="#">Chi phí hợp lý</a></li>
               </ul>
            </div>
         </div>
         <div class="row">
             <div class="col-md-8">
                <p>&copy; 2017-2018 Salesflow.vn. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
             </div>
             <div class="col-md-4">
                <p class="text-right"><a href="#">Back to top</a></p>
            </div>
         </div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
   </body>
</html>