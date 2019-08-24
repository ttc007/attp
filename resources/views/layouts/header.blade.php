<input type="hidden" id="ward_id" value="{{Session::get('ward_id')}}">
<input type="hidden" id="auth_ward_role" value="{{@Auth::user()->role}}">

<header class="site-header">
    <div class="container-fluid">
        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="{{ asset('img/logo.png')}}" alt="">
            <img class="hidden-lg-up" src="{{ asset('img/logo.png')}}" alt="">
        </a>

        <div class="dropdown dropdown-typical workspace-link">
            <a class="dropdown-toggle" id="dd-header-social" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class=""></span>
                <span class="lbl1">
            Chọn ban ngành
           </span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dd-header-social">
                @foreach(app('App\Http\Controllers\FoodSafetyController')->getCategories() as $value)
                <a class="dropdown-item" href="/food_safety/{{$value->slug}}"><span class="font-icon font-icon-cart"></span>{{$value->name}}</a>
                    
                @endforeach
            </div>
        </div>
        
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    @if(Auth::user())
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="showUserMenu()">
                            <img src="{{ asset('img/avatar-2-64.png')}}" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <!-- @guest
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                            @else -->
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile's {{ Auth::user()->name }}</a>
                            
                            @if(Auth::user()&&
                                (Auth::user()->role=='admin'||Auth::user()->role=='hql')
                            )
                            <a class="dropdown-item" href="/ward"><span class="font-icon glyphicon glyphicon-cog"></span>Quản lí Xã</a>
                            <a class="dropdown-item" href="/category"><span class="font-icon glyphicon glyphicon-cog"></span>Quản lí ban ngành</a>
                            <a class="dropdown-item" href="/test"><span class="font-icon glyphicon glyphicon-cog"></span>Quản lí test</a>
                            <a class="dropdown-item" href="/user"><span class="font-icon glyphicon glyphicon-cog"></span>Quản lí user</a>
                            @endif

                            @if(Auth::user()&&Auth::user()->role==Session::get('ward_id'))
                            <a class="dropdown-item" href="/village"><span class="font-icon glyphicon glyphicon-cog"></span>Quản lý thôn</a>
                            <a class="dropdown-item" href="/test"><span class="font-icon glyphicon glyphicon-cog"></span>Quản lí test</a>
                            @endif
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <span class="font-icon glyphicon glyphicon-log-out"></span>Logout
                                    </a>
                            <form id="logout-form" data-uid="{{ Auth::user()->id }}" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            <!-- @endguest -->
                        </div>
                    </div>
                    @endif
                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                        
                        <div class="dropdown dropdown-typical">
                            <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="font-icon font-icon-cogwheel"></span>
                                <span class="lbl">Xem tình hình xã khác</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
                                @foreach(app('App\Http\Controllers\WardController')->api_get() as $value)
                                    <a href="/view_ward_ss/{{$value->id}}" class="dropdown-item {{Auth::user()&&$value->id==Auth::user()->role?'text-danger':''}}" title="Xem tình hình hoạt động của xã {{$value->name}}" >
                                    Xã {{$value->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="dropdown dropdown-typical">
                        </div>
                        <div class="help-dropdown">
                            <a href="/communication" class="btn btn-primary">Kênh truyền thông</a>
                            <a href="/lawSystem" class="btn btn-success">
                            Hệ thống pháp luật</a>
                            @guest
                                <a href="/login" class="btn btn-warning">Đăng nhập</a>
                            @endguest
                        </div><!--.help-dropdown-->
                    </div><!--.site-header-collapsed-in-->
                </div><!--.site-header-collapsed-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->