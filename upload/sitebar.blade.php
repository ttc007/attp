@if(Auth::user())
<nav class="side-menu side-menu-compact">
    <ul class="side-menu-list">
        <!-- <li class="brown">
            <a href="#">
                <i class="font-icon font-icon-home"></i>
                <span class="lbl">Overview</span>
            </a>
        </li> -->
        
        
        @if(Auth::user()->role()=='employess')
            <li class="blue-dirty @if(Request::is('project') || Request::is('task/add') || Request::is('task/mytask')) opened @endif">
                <a href="{{route('projectEmployess')}}/{{Auth::id()}}">
                    <i class="font-icon font-icon-notebook"></i>
                    <span class="lbl">Công trình</span>
                </a>
            </li>
        @endif
        @if(isset($workspace) && $workspace=='marketing')
             <li class="purple @if(Request::is('lead') || Request::is('lead/create') || Request::is('lead/create')) opened @endif">
                <a href="/sales/lead">
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <span class="lbl">Cơ hội</span>
                </a>
            </li>

            <li class="gold @if(Request::is('campaign') || Request::is('marketing/campaign/add'))) opened @endif">
            <a href="{{route('campaign')}}">
                <i class="font-icon font-icon-event"></i>
                <span class="lbl">Chiến dịch</span>
            </a>
             </li>

            <li class="blue">
                <a href="/marketing/template">
                    <i class="font-icon font-icon-event"></i>
                    <span class="lbl">Template</span>
                </a>
            </li>

            <li class="aquamarine">
                <a href="/marketing/document">
                    <i class="font-icon font-icon-doc"></i>
                    <span class="lbl">Document</span>
                </a>
            </li>
        @endif

        @if(isset($workspace) && $workspace=='sales')
        <li class="green @if(Request::is('contact')) opened @endif">
                <a href="{{route('contact')}}">
                    <i class="font-icon font-icon-contacts"></i>
                    <span class="lbl">Liên hệ</span>
                </a>
        </li>

        <li class="blue-dirty @if(Request::is('contact')) opened @endif">
                <a href="{{route('company')}}">
                    <i class="font-icon font-icon-build"></i>
                    <span class="lbl">Công ty</span>
                </a>
        </li>

         <li class="gold @if(Request::is('sales.contract')) opened @endif">
            <a href="/sales/contract">
                <i class="font-icon font-icon-notebook"></i>
                <span class="lbl">Giao dịch</span>
            </a>
        </li>
        
        <li class="aquamarine @if(Request::is('sales.task')) opened @endif">
            <a href="{{route('sales.task')}}">
                <i class="glyphicon glyphicon-list "></i>
                <span class="lbl">Nhiệm vụ</span>
            </a>
        </li>

        <li class="pink-red @if(Request::is('sales.task')) opened @endif">
            <a href="{{route('sales.activity')}}">
                <i class="font-icon font-icon-zigzag"></i>
                <span class="lbl">Hoạt động</span>
            </a>
        </li>
    

         <li class="brown @if(Request::is('account')) opened @endif">
            <a href="{{route('account.index')}}">
                <i class="font-icon font-icon-wallet"></i>
                <span class="lbl">Tài khoản</span>
            </a>
        </li>

        @endif
       
        @if(isset($workspace) && $workspace=='workplace')
        <li class="green @if(Request::is('work') || Request::is('work/report') || Request::is('work/mywork')) opened @endif">
            <a href="{{route('work')}}">
                <i class="glyphicon glyphicon-equalizer"></i>
                <span class="lbl">Công việc</span>
            </a>
        </li>

        @if(Auth::user()->role()=='manager')
        <li class="gold @if(Request::is('kpi') || Request::is('kpi/add')) opened @endif">
            <a href="{{route('kpi')}}">
                <i class="font-icon font-icon-speed"></i>
                <span class="lbl">KPIs</span>
            </a>
        </li>

        <li class="magenta @if(Request::is('task') || Request::is('task/add')) opened @endif">
            <a href="/workplace/task">
                <i class="font-icon font-icon-notebook"></i>
                <span class="lbl">Nhiệm vụ</span>
            </a>
        </li>
        
        <li class="blue-dirty @if(Request::is('project') || Request::is('task/add') || Request::is('task/mytask')) opened @endif">
            <a href="{{route('project')}}">
                <i class="font-icon font-icon-build"></i>
                <span class="lbl">Dự án</span>
            </a>
        </li>

        <li class="blue-dirty @if(Request::is('contract')) opened @endif">
            <a href="{{route('contract.index')}}">
                <i class="font-icon font-icon-case-2"></i>
                <span class="lbl">Hợp đồng</span>
            </a>
        </li>

         <li class="grey @if(Request::is('acceptance')) opened @endif">
            <a href="{{route('acceptance')}}">
                <i class="font-icon  font-icon-event"></i>
                <span class="lbl">Nghiệm thu</span>
            </a>
        </li>
         <li class="red @if(Request::is('statistic')) opened @endif">
            <a href="{{route('statistic.index')}}">
                <i class="font-icon font-icon-chart"></i>
                <span class="lbl">Báo cáo</span>
            </a>
        </li>
        
        @endif

       @endif
       <!-- <li class="pink-red">
            <a href="#">
                <i class="font-icon font-icon-zigzag"></i>
                <span class="lbl">Activity</span>
            </a>
        </li>
        <li class="grey">
            <a href="#">
                <i class="font-icon font-icon-doc"></i>
                <span class="lbl">Documents</span>
            </a>
        </li>
        <li class="blue-sky">
            <a href="#">
                <i class="font-icon font-icon-question"></i>
                <span class="lbl">Help</span>
            </a>
        </li>
        <li class="coral">
            <a href="#">
                <i class="font-icon font-icon-cogwheel"></i>
                <span class="lbl">Settings</span>
            </a>
        </li>
        <li class="magenta">
            <a href="#">
                <i class="font-icon font-icon-user"></i>
                <span class="lbl">Profile</span>
            </a>
        </li>
        <li class="brown">
            <a href="#">
                <i class="font-icon font-icon-event"></i>
                <span class="lbl">Event</span>
            </a>
        </li>
        <li class="red">
            <a href="#">
                <i class="font-icon font-icon-case-2"></i>
                <span class="lbl">Project</span>
            </a>
        </li>-->
    </ul>
</nav><!--.side-menu-->
@endif