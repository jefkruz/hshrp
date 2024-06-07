<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Ministry Reporting Solution">
    <meta name="keywords" content="christ,embassy,report,finance">
    <meta name="author" content="{{env('DEV')}}">
    <meta name="robots" content="noindex, nofollow">
    <title>Feedback - HR PORTAL</title>

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


</head>
<body class="account-page">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
{{--        <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a>--}}
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="#"><img src="{{url('assets/images/logo.png')}}" alt=""></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Staff Week</h3>
                    <p class="account-subtitle">Feedback Form</p>
                    <div class="row">

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
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif

                    </div>

                    <!-- Account Form -->
                    <form  method="POST">
                        @csrf
                        <div class="form-group">
                            <label> Full Name</label>
                            <input class="form-control"  name="name"  required type="text">
                        </div>
                        <div class="form-group">
                            <label>KingsChat Handle</label>
                            <input class="form-control" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input class="form-control" name="department" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Appreciation Message to the Director</label>
                            <textarea class="form-control" rows="5" cols="5" name="message" ></textarea>

                        </div>
                        <div class="form-group">
                            <label>Immediate changes you would make as a result</label>
                            <textarea class="form-control" rows="5" cols="5" name="changes"> </textarea>

                        </div>
                        <div class="form-group">
                            <label>Expected results in the next 3 months</label>
                            <textarea class="form-control" rows="5" cols="5" name="result" placeholder=" (End of September)"></textarea>

                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Submit</button>
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

<!-- Select2 JS -->
<script src="{{url('assets/js/select2.min.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{url('assets/js/moment.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{url('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{url('assets/js/app.js')}}"></script>

</body>
</html>
