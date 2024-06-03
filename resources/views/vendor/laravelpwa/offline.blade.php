<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Ministry Reporting Solution">
    <meta name="keywords" content="christ,embassy,report,finance">
    <meta name="author" content="{{env('DEV')}}">
    <meta name="robots" content="noindex, nofollow">
    <title> - {{env('APP_NAME')}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/72x72.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/css/line-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">


</head>
<body class="error-page">
<!-- Main Wrapper -->
<div class="main-wrapper">

    <div class="error-box">
        <h2>OFFLINE</h2>
        <h3><i class="fa fa-warning"></i> Unable to connect!</h3>
        <p>Please check your Internet Connection to proceed.</p>
        <a href="{{route('dashboard')}}" class="btn btn-custom">Back to Dashboard</a>
    </div>

</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="{{url('assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{url('assets/js/popper.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{url('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{url('assets/js/app.js')}}"></script>


</body>
</html>
