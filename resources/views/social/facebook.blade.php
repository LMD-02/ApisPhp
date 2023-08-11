
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? '' }} - {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/logo/logo_sm.png')}}">
    <link href="{{asset('/css/checkbox.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css -->
    <link href="{{asset('/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
    @stack('css')
    <style>
        .content-page{
            width: 100% !important;
            margin-left:0 !important;
        }
        .navbar-custom{
            left:0 !important;
        }
    </style>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="page-title-box">--}}
{{--                            <h4 class="page-title">Facebook</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="container card  p-3">
                    <div class="d-flex justify-content-between">
                    <div>
                        <img  style="width:60px;height: 60px" src="{{asset('images/logo/facebook.png')}}">
                            <span>Facebook</span>
                    </div>
                    <div class="d-flex align-content-center ">
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="images/avatar/role3.png" alt="avatar" class="rounded-circle">
                            </span>
                            <span>
                                <span class="account-user-name">{{$socialAccounts->name}}</span>
                                <span class="account-position" style="color:#05d005;">Online</span>
                            </span>
                        </a>
                        <div class="d-flex align-center" style="align-items:center;background-color:#fafbfd">
                            <a href="{{route('out.social.facebook')}}" class="btn btn-danger btn-sm h-50">
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active" aria-selected="true" role="tab">
                                        Timeline
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- end about me section content -->

                                <div class="tab-pane active show" id="timeline" role="tabpanel">

                                    <!-- comment box -->
                                    <div class="border rounded mt-2 mb-3">
                                        <form action="#" class="comment-area-box">
                                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Write something...."></textarea>
                                            <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-account-circle"></i></a>
                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-map-marker"></i></a>
                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-camera"></i></a>
                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-emoticon-outline"></i></a>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-dark waves-effect">Post</button>
                                            </div>
                                        </form>
                                    </div> <!-- end .border-->
                                    <!-- end comment box -->

                                    <!-- Story Box-->
                                    <div class="border border-light rounded p-2 mb-3">
                                        <div class="d-flex">
                                            <img class="me-2 rounded-circle" src="{{asset('images/users/avatar-3.jpg')}}" alt="Generic placeholder image" height="32">
                                            <div>
                                                <h5 class="m-0">Jeremy Tomlinson</h5>
                                                <p class="text-muted"><small>about 2 minuts ago</small></p>
                                            </div>
                                        </div>
                                        <p>Story based around the idea of time lapse, animation to post soon!</p>

                                        <img src="{{asset('images/small/small-1.jpg')}}" alt="post-img" class="rounded me-1" height="60">
                                        <img src="{{asset('images/small/small-2.jpg')}}" alt="post-img" class="rounded me-1" height="60">
                                        <img src="{{asset('images/small/small-3.jpg')}}" alt="post-img" class="rounded" height="60">

                                        <div class="mt-2">
                                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                        </div>
                                    </div>

                                    <!-- Story Box-->
                                    <div class="border border-light rounded p-2 mb-3">
                                        <div class="d-flex">
                                            <img class="me-2 rounded-circle" src="{{asset('images/users/avatar-4.jpg')}}" alt="Generic placeholder image" height="32">
                                            <div>
                                                <h5 class="m-0">Thelma Fridley</h5>
                                                <p class="text-muted"><small>about 1 hour ago</small></p>
                                            </div>
                                        </div>
                                        <div class="font-16 text-center fst-italic text-dark">
                                            <i class="mdi mdi-format-quote-open font-20"></i> Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                            purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                            sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                            porta. Mauris massa.
                                        </div>

                                        <div class="mx-n2 p-2 mt-3 bg-light">
                                            <div class="d-flex">
                                                <img class="me-2 rounded-circle" src="{{asset('images/users/avatar-3.jpg')}}" alt="Generic placeholder image" height="32">
                                                <div>
                                                    <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                                    Nice work, makes me think of The Money Pit.

                                                    <br>
                                                    <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                                    <div class="d-flex mt-3">
                                                        <a class="pe-2" href="#">
                                                            <img src="{{asset('images/users/avatar-4.jpg')}}" class="rounded-circle" alt="Generic placeholder image" height="32">
                                                        </a>
                                                        <div>
                                                            <h5 class="mt-0">Thelma Fridley <small class="text-muted">5 hours ago</small></h5>
                                                            i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="mt-2">
                                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                        </div>
                                    </div>

                                    <!-- Story Box-->


                                    <div class="text-center">
                                        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                                    </div>

                                </div>
                                <!-- end timeline content-->

                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                        </div> <!-- end card body -->
                    </div>
                </div>
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
{{--        @include('layout.footer')--}}
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout width, etc.
            </div>

            <!-- Settings -->
            <h5 class="mt-3">Color Scheme</h5>
            <hr class="mt-1" />

            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light" id="light-mode-check"
                       checked />
                <label class="custom-control-label" for="light-mode-check">Light Mode</label>
            </div>

            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
            </div>

            <!-- Width -->
            <h5 class="mt-4">Width</h5>
            <hr class="mt-1"/>
            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                <label class="custom-control-label" for="fluid-check">Fluid</label>
            </div>
            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                <label class="custom-control-label" for="boxed-check">Boxed</label>
            </div>



            <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

            <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-basket mr-1"></i> Purchase Now</a>
        </div> <!-- end padding-->

    </div>
</div>

<div class="rightbar-overlay"></div>
<!-- /Right-bar -->

<!-- bundle -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/js/vendor.min.js')}}"></script>
<script src="{{asset('/js/app.min.js')}}"></script>
<script src="{{asset('/js/vendor/apexcharts.min.js')}}"></script>
<script src="{{asset('/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('/js/helper.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
@stack('js')
<script src="{{asset('')}}assets/js/pages/demo.dashboard.js"></script>
<!-- end demo js-->
</body>
</html>
