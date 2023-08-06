<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="{{route('admin')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('images/logo/login.jpg')}}" alt="" height="64px">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('images/logo/logo_sm.png')}}" alt="" height="20">
                    </span>
    </a>

    <!-- LOGO -->
{{--    <a href="index.html" class="logo text-center logo-dark">--}}
{{--                    <span class="logo-lg">--}}
{{--                        <img src="assets/images/logo-dark.png" alt="" height="16">--}}
{{--                    </span>--}}
{{--        <span class="logo-sm">--}}
{{--                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">--}}
{{--                    </span>--}}
{{--    </a>--}}

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Thông tin</li>
                @if(Auth::user()->role_id == 2)
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="mdi mdi-human-male-female"></i>
                        <span> Sinh viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                        <li>
                            <a href="">Quản lý</a>
                        </li>
                    </ul>
                </li>
                    @elseif(Auth::user()->role_id == 1)
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="mdi mdi-human-male-female"></i>
                        <span> Sinh viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                        <li>
                            <a href="">Quản lý cá nhân</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
