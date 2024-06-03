<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Ministry Reporting Solution">
    <meta name="keywords" content="christ,embassy,report,finance">
    <meta name="author" content="{{env('DEV')}}">
    <meta name="robots" content="noindex, nofollow">
    <title>Authentication - {{env('APP_NAME')}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/72x72.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{url('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{url('assets/js/respond.min.js')}}"></script>
    <![endif]-->
    @laravelPWA
</head>
<body class="account-page" style="background-color: #34346b">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="{{route('login')}}"><img src="{{url('assets/images/logo.png')}}" alt=""></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">{{$person['message']}}</h3>

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                <!-- Account Form -->
                    <form method="post" action="{{route($person['route'])}}">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" value="{{old('username')}}" placeholder="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
                        </div>
                    </form>
                    <!-- /Account Form -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{url('assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{url('assets/js/popper.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{url('assets/js/app.js')}}"></script>

</body>
</html>
