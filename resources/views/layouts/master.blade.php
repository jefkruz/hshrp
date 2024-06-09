<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Personnel Management Integrated System">
    <meta name="keywords" content="healing School, report,hr">
    <meta name="author" content="{{env('DEV')}}">
    <meta name="robots" content="noindex, nofollow">
    <title>{{$page_title}} - HR PORTAL</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/logo.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/css/line-awesome.min.css')}}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{url('assets/css/select2.min.css')}}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{url('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{url('assets/js/respond.min.js')}}"></script>
    <![endif]-->

    @yield('style')
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{route('dashboard')}}" class="logo">
                <img src="{{url('assets/images/logo.png')}}" width="40" height="40" alt="">
            </a>
        </div>
        <!-- /Logo -->

        <a id="toggle_btn" href="javascript:void(0);">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>

        <!-- Header Title -->
        <div class="page-title-box">
            <h3>{{env('APP_NAME')}}</h3>
        </div>
        <!-- /Header Title -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <!-- Header Menu -->
        <ul class="nav user-menu">

            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="{{session('staff')->profile_pic}}" alt="">
							<span class="status online"></span></span>
                    <span>{{session('staff')->title}} {{session('staff')->firstname}} {{session('staff')->lastname}}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </li>
        </ul>
        <!-- /Header Menu -->

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    @foreach($menu as $item)
                    <li class="{{$item['active']}}">
                        <a href="{{route($item['route'])}}"><i class="{{$item['icon']}}"></i> <span>{{$item['name']}}</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                        @if($errors->any())

                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">

                                <span class="alert-inner--text">
                                    @foreach($errors->all()  as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </span>

                            </div>

                        @endif
                    @if(session('message'))
                    <div class="alert alert-primary">{{session('message')}}</div>
                    @endif
                </div>
            </div>

            <!-- Content Starts -->
            @yield('content')
            <!-- /Content End -->

        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{url('assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{url('assets/js/popper.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<!-- Mask JS -->
<script src="{{url('assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{url('assets/js/mask.js')}}"></script>

<!-- Select2 JS -->
<script src="{{url('assets/js/select2.min.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{url('assets/js/moment.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{url('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{url('assets/js/app.js')}}"></script>

@yield('script')

</body>
</html>
