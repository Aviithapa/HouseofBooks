<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" id="main-menu" style="background: #ffffff !important;">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
                <img src="{{$authUser->getImage()}}" alt="" data-src="{{$authUser->getImage()}}" data-src-retina="{{$authUser->getImage()}}" width="69" height="69" />
                <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
                <div class="username"><span class="semi-bold" style="color: black">{{$authUser->name}}</span></div>
                <div class="status" style="color: #0A2640">{{$authUser->mainRole()?$authUser->mainRole()->display_name:''}}</div>
            </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU -->
        <h4 class="menu-title lg">Explore <span class="pull-right"><a href="javascript:void(0);"><i class="material-icons">refresh</i></a></span></h4>
        <ul>
            <li>
                <a href="{{route('dashboard.index')}}">
                    <i class="material-icons">home</i>
                    <span class="title" style="color: black !important;">Dashboard</span>
                    <span class="label label-important bubble-only pull-right "></span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.products.create')}}">
                    <i class="material-icons">book</i>
                    <span class="title" style="color: black !important;">Add Book</span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.products.index')}}">
                    <i class="material-icons">book</i>
                    <span class="title" style="color: black !important;">My Books</span>
                </a>
            </li>

        </ul>
        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<a href="#" class="scrollup">Scroll</a>
<!-- END SIDEBAR -->
