@if(Auth::user())
<nav class="side-menu side-menu-compact">
    <ul class="side-menu-list">
        @if(Auth::user()->role=='hql')
            <li class="blue-dirty @if(Request::is('food_safety/reportMaster')) opened @endif">
                <a href="/food_safety/reportMaster">
                    <i class="font-icon font-icon-notebook"></i>
                    <span class="lbl">Báo cáo tổng hợp</span>
                </a>
            </li>
            <li class="gold @if(Request::is('food_safety/reportUnexpected')) opened @endif">
                <a href="/food_safety/reportUnexpected">
                    <i class="font-icon font-icon-event"></i>
                    <span class="lbl">Kiểm tra theo đợt</span>
                </a>
            </li>
            <li class="aquamarine @if(Request::is('post')) opened @endif">
                <a href="/post">
                    <i class="font-icon font-icon-doc"></i>
                    <span class="lbl">Quản lí bảng tin</span>
                </a>
            </li>
        @endif
    </ul>
</nav><!--.side-menu-->
@endif