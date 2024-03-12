
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesbox.in/admin-templates/orbiter/html/light-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2022 14:40:14 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Orbiter - Bootstrap Minimal & Clean Admin Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico">
    <!-- Start css -->
    <link href="{{asset('assets2')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2')}}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2')}}/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<script>
                                @if (Session::has('password_message'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true,
                                        "showDuration": "400",
                                    }
                                    toastr.error("{{ session('password_message') }}");
                                @endif

                                @if (Session::has('message'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true,
                                        "showDuration": "300",
                                    }
                                    toastr.info("{{ session('message') }}");
                                @endif

                                @if (Session::has('email_message'))
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true,
                                        "showDuration": "400",
                                    }
                                    toastr.error("{{ session('email_message') }}");
                                @endif
                            </script>
<form method="POST" action="{{route('post.signup')}}">
        @csrf
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                   
                                        <div class="form-head">
                                            <a href="index-2.html" class="logo"><img src="{{asset('assets')}}/images/logo.svg" class="img-fluid" alt="logo"></a>
                                        </div>                                        
                                        <h4 class="text-primary my-4">Sign Up!</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name here" required>
                                            @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" placeholder="Enter Email here" required>
                                            @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password here" required>
                                            @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password here" required>
                                            @error('confirm_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                                               
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Sign up</button>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="{{asset('assets2')}}/js/jquery.min.js"></script>
    <script src="{{asset('assets2')}}/js/popper.min.js"></script>
    <script src="{{asset('assets2')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets2')}}/js/modernizr.min.js"></script>
    <script src="{{asset('assets2')}}/js/detect.js"></script>
    <script src="{{asset('assets2')}}/js/jquery.slimscroll.js"></script>
    <!-- End js -->
</body>

<!-- Mirrored from themesbox.in/admin-templates/orbiter/html/light-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Mar 2022 14:40:14 GMT -->
</html>
