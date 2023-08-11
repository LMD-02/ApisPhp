
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
                            <img  style="width:60px;height: 60px" src="{{asset('images/logo/google.png')}}">
                            <span>Google</span>
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
                                <a href="{{route('out.social.google')}}" class="btn btn-danger btn-sm h-50">
                                    Đăng xuất
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <!-- Left sidebar -->
                            <div class="page-aside-left">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compose-modal">Compose</button>
                                </div>

                                <div class="email-menu-list mt-3">
                                    <a href="javascript: void(0);" class="text-danger fw-bold"><i class="ri-inbox-line me-2"></i>Inbox<span class="badge badge-danger-lighten float-end ms-2">7</span></a>
                                    <a href="javascript: void(0);"><i class="ri-star-line me-2"></i>Starred</a>
                                    <a href="javascript: void(0);"><i class="ri-time-line me-2"></i>Snoozed</a>
                                    <a href="javascript: void(0);"><i class="ri-article-line me-2"></i>Draft<span class="badge badge-info-lighten float-end ms-2">32</span></a>
                                    <a href="javascript: void(0);"><i class="ri-mail-send-line me-2"></i>Sent Mail</a>
                                    <a href="javascript: void(0);"><i class="ri-delete-bin-line me-2"></i>Trash</a>
                                    <a href="javascript: void(0);"><i class="ri-price-tag-3-line me-2"></i>Important</a>
                                    <a href="javascript: void(0);"><i class="ri-alert-line me-2"></i>Spam</a>
                                </div>

                                <div class="mt-4">
                                    <h6 class="text-uppercase">Labels</h6>
                                    <div class="email-menu-list labels-list mt-2">
                                        <a href="javascript: void(0);"><i class="mdi mdi-circle font-13 text-info me-2"></i>Updates</a>
                                        <a href="javascript: void(0);"><i class="mdi mdi-circle font-13 text-warning me-2"></i>Friends</a>
                                        <a href="javascript: void(0);"><i class="mdi mdi-circle font-13 text-success me-2"></i>Family</a>
                                        <a href="javascript: void(0);"><i class="mdi mdi-circle font-13 text-primary me-2"></i>Social</a>
                                        <a href="javascript: void(0);"><i class="mdi mdi-circle font-13 text-danger me-2"></i>Important</a>
                                        <a href="javascript: void(0);"><i class="mdi mdi-circle font-13 text-secondary me-2"></i>Promotions</a>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h4><span class="badge rounded-pill p-1 px-2 badge-secondary-lighten">FREE</span></h4>
                                    <h6 class="text-uppercase mt-3">Storage</h6>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar progress-lg bg-success" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-muted font-13 mb-0">7.02 GB (46%) of 15 GB used</p>
                                </div>

                            </div>
                            <!-- End Left sidebar -->

                            <div class="page-aside-right">

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-archive font-16"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-alert-octagon font-16"></i></button>
                                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-delete-variant font-16"></i></button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-folder font-16"></i>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-header">Move to:</span>
                                        <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-label font-16"></i>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-header">Label as:</span>
                                        <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-16"></i> More
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-header">More Options :</span>
                                        <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                                        <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <ul class="email-list">
                                        <li class="unread">
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail1">
                                                        <label class="form-check-label" for="mail1"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">Lucas Kriebel (via Twitter)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Lucas Kriebel (@LucasKriebel) has sent
                                                    you a direct message on Twitter! &nbsp;–&nbsp;
                                                    <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                                </a>
                                                <div class="email-date">11:49 am</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-open email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail2">
                                                        <label class="form-check-label" for="mail2"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Randy, me (5)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Last pic over my village &nbsp;–&nbsp;
                                                    <span>Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                </a>
                                                <div class="email-date">5:01 am</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail3">
                                                        <label class="form-check-label" for="mail3"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">Andrew Zimmer</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Mochila Beta: Subscription Confirmed
                                                    &nbsp;–&nbsp; <span>You've been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span>
                                                </a>
                                                <div class="email-date">Mar 8</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="unread">
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail4">
                                                        <label class="form-check-label" for="mail4"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Infinity HR</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Sveriges Hetaste sommarjobb &nbsp;–&nbsp;
                                                    <span>Hej Nicklas Sandell! Vi vill bjuda in dig till "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16 semesterorter iSverige.</span>
                                                </a>
                                                <div class="email-date">Mar 8</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-open email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail5">
                                                        <label class="form-check-label" for="mail5"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Web Support Dennis</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Re: New mail settings &nbsp;–&nbsp;
                                                    <span>Will you answer him asap?</span>
                                                </a>
                                                <div class="email-date">Mar 7</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail6">
                                                        <label class="form-check-label" for="mail6"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">me, Peter (2)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Off on Thursday &nbsp;–&nbsp;
                                                    <span>Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span>
                                                </a>
                                                <div class="email-date">Mar 4</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail7">
                                                        <label class="form-check-label" for="mail7"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Medium</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">This Week's Top Stories &nbsp;–&nbsp;
                                                    <span>Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span>
                                                </a>
                                                <div class="email-date">Feb 28</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail8">
                                                        <label class="form-check-label" for="mail8"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">Death to Stock</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Montly High-Res Photos &nbsp;–&nbsp;
                                                    <span>To create this month's pack, we hosted a party with local musician Jared Mahone here in Columbus, Ohio.</span>
                                                </a>
                                                <div class="email-date">Feb 28</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail9">
                                                        <label class="form-check-label" for="mail9"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Revibe</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Weekend on Revibe &nbsp;–&nbsp;
                                                    <span>Today's Friday and we thought maybe you want some music inspiration for the weekend. Here are some trending tracks and playlists we think you should give a listen!</span>
                                                </a>
                                                <div class="email-date">Feb 27</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail10">
                                                        <label class="form-check-label" for="mail10"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Erik, me (5)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Regarding our meeting &nbsp;–&nbsp;
                                                    <span>That's great, see you on Thursday!</span>
                                                </a>
                                                <div class="email-date">Feb 24</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail11">
                                                        <label class="form-check-label" for="mail11"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">KanbanFlow</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Task assigned: Clone ARP's website
                                                    &nbsp;–&nbsp; <span>You have been assigned a task by Alex@Work on the board Web.</span>
                                                </a>
                                                <div class="email-date">Feb 24</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail12">
                                                        <label class="form-check-label" for="mail12"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Tobias Berggren</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Let's go fishing! &nbsp;–&nbsp;
                                                    <span>Hey, You wanna join me and Fred at the lake tomorrow? It'll be awesome.</span>
                                                </a>
                                                <div class="email-date">Feb 23</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail13">
                                                        <label class="form-check-label" for="mail13"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">Charukaw, me (7)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Hey man &nbsp;–&nbsp; <span>Nah man sorry i don't. Should i get it?</span>
                                                </a>
                                                <div class="email-date">Feb 23</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="unread">
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail14">
                                                        <label class="form-check-label" for="mail14"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">me, Peter (5)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Home again! &nbsp;–&nbsp; <span>That's just perfect! See you tomorrow.</span>
                                                </a>
                                                <div class="email-date">Feb 21</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-open email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail15">
                                                        <label class="form-check-label" for="mail15"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Stack Exchange</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">1 new items in your Stackexchange inbox
                                                    &nbsp;–&nbsp; <span>The following items were added to your Stack Exchange global inbox since you last checked it.</span>
                                                </a>
                                                <div class="email-date">Feb 21</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail16">
                                                        <label class="form-check-label" for="mail16"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline text-warning"></span>
                                                <a href="javascript: void(0);" class="email-title">Google Drive Team</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">You can now use your storage in Google
                                                    Drive &nbsp;–&nbsp; <span>Hey Nicklas Sandell! Thank you for purchasing extra storage space in Google Drive.</span>
                                                </a>
                                                <div class="email-date">Feb 20</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="unread">
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail17">
                                                        <label class="form-check-label" for="mail17"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">me, Susanna (11)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Train/Bus &nbsp;–&nbsp; <span>Yes ok, great! I'm not stuck in Stockholm anymore, we're making progress.</span>
                                                </a>
                                                <div class="email-date">Feb 19</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-open email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail18">
                                                        <label class="form-check-label" for="mail18"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Peter, me (3)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Hello &nbsp;–&nbsp; <span>Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                                </a>
                                                <div class="email-date">Jan 28</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail19">
                                                        <label class="form-check-label" for="mail19"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">me, Susanna (7)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Since you asked... and i'm
                                                    inconceivably bored at the train station &nbsp;–&nbsp;
                                                    <span>Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                                </a>
                                                <div class="email-date">Jan 25</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="email-sender-info">
                                                <div class="checkbox-wrapper-mail">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="mail20">
                                                        <label class="form-check-label" for="mail20"></label>
                                                    </div>
                                                </div>
                                                <span class="star-toggle mdi mdi-star-outline"></span>
                                                <a href="javascript: void(0);" class="email-title">Randy, me (5)</a>
                                            </div>
                                            <div class="email-content">
                                                <a href="javascript: void(0);" class="email-subject">Last pic over my village &nbsp;–&nbsp;
                                                    <span>Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                </a>
                                                <div class="email-date">Jan 22</div>
                                            </div>
                                            <div class="email-action-icons">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end .mt-4 -->

                                <div class="row">
                                    <div class="col-7 mt-1">
                                        Showing 1 - 20 of 289
                                    </div> <!-- end col-->
                                    <div class="col-5">
                                        <div class="btn-group float-end">
                                            <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                                            <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
                                        </div>
                                    </div> <!-- end col-->
                                </div>
                                <!-- end row-->
                            </div>
                            <!-- end inbox-rightbar-->
                        </div>
                        <!-- end card-body -->
                        <div class="clearfix"></div>
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
