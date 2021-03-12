<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="libraries\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- themify-icons line icon -->
    <link href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <!-- ico font -->
    <link href="{{ asset('assets/icon/icofont/css/icofont.css') }}" rel="stylesheet">
    <!-- Style.css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>


<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->



{{-- @section('content') --}}
<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- Authentication card start -->
                    <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center">
                            <img src="..\files\assets\images\logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Sign In</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required="" placeholder="Your Email Address">
                                    <span class="form-bar"></span>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group form-primary">
                                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required="" placeholder="Password">
                                    <span class="form-bar"></span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">{{ __('Remember Me') }}</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="{{ route('password.request') }}" class="text-right f-w-600">{{ __('Forgot Your Password?') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">{{ __('Login') }}</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="index-1.htm"><b class="f-w-600">Back to website</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="..\files\assets\images\auth\Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

<script src="{{ asset('bower_components\jquery\js\jquery.min.js') }}" defer></script>
<script src="{{ asset('bower_components\jquery-ui\js\jquery-ui.min.js') }}" defer></script>
<script src="{{ asset('bower_components\popper.js\js\popper.min.js') }}" defer></script>
<script src="{{ asset('bower_components\bootstrap\js\bootstrap.min.js') }}" defer></script>
<!-- jquery slimscroll js -->
<script src="{{ asset('bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}" defer></script>
<!-- modernizr js -->
<script src="{{ asset('bower_components\modernizr\js\modernizr.js') }}" defer></script>
<script src="{{ asset('bower_components\modernizr\js\css-scrollbars.js') }}" defer></script>
<!-- i18next.min.js -->
<script src="{{ asset('bower_components\i18next\js\i18next.min.js') }}" defer></script>
<script src="{{ asset('bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js') }}" defer></script>
<script src="{{ asset('bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js') }}" defer></script>
<script src="{{ asset('bower_components\jquery-i18next\js\jquery-i18next.min.js') }}" defer></script>
<script src="{{ asset('assets\js\common-pages.js') }}" defer></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
