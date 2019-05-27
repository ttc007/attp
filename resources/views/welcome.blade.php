<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Food safety</title>
      <!-- Fonts -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Arimo|Roboto|Roboto+Slab" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/theme.css')}}">
   </head>
   <body class="text-center" style="background-image: url({{asset('img/welcome.jpg')}}); background-size: cover;">
      

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <!-- <h3 class="masthead-brand text-white"><img class="w-25" src="{{asset('img/novaio.svg')}}"> Salesflow.vn <span class="beta">Beta</span></h3> -->
          
        </div>
      </header>

      <main role="main" class="inner cover text-white">
        <h1 class="cover-heading">#1 Phần mềm quản lí vệ sinh an toàn thực phẩm!</h1>
        <nav class="nav nav-masthead justify-content-center">
             @if (Route::has('login'))
              
                  @auth
                  <a class="btn btn-primary p-4 rounded-0 text-white" 
                    href="/home">Bảng điều khiển</a>
                  @else
                  <a class="btn btn-success p-4 rounded-0 text-white" href="{{ route('login') }}">Đăng nhập</a>
                  <!-- <a class="btn btn-primary p-4 rounded-0 text-white" href="{{ route('register') }}">Yêu cầu dùng thử</a> -->
                  <a href="/admin_view_choose" class="btn btn-primary p-4 rounded-0 text-white">Xem với tư cách admin</a>
                  @endauth
               
               @endif
          </nav>
        <p class="lead">Quản lý các cơ sở đơn giản, cộng tác đồng nghiệp dễ dàng, phạm vi quản lí rộng và chặt chẽ.</p>
        <p class="lead">
          <!-- <a href="http://Salesflow.vn" class="btn btn-lg btn-secondary">Xem thêm</a> -->
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>@2018 a member of <a href="http://novaio.vn/">Company C jsc</a></p>
        </div>
      </footer>
    </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
   </body>
</html>