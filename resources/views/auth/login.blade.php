<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('../user/img/favicon.ico')}}">

   <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('../user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/owl.carousel.min.css') }}">            
    <link rel="stylesheet" href="{{ asset('../user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/slicknav.css') }}">        
    <link rel="stylesheet" href="{{ asset('../user/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../user/css//font-awesome-4.7.0/css/font-awesome.min.css') }}">
            
    <link rel="stylesheet" href="{{ asset('../assets/node_modules/dropify/dist/css/dropify.min.css') }}">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader Start -->
   
    <!-- Preloader Start -->
   
    <!-- Hero Area Start-->
   
        <!-- Hero Area End -->
    <div class="slider-area ">
        <div class="single-slider slider-height d-flex align-items-center" data-background="{{asset('../user/img/mmm.jpg')}}">
        <div class="container"> </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                       <h4 class="card-title" style="text-align: center;"  ><i class="fa fa-home"></i> <hr> Connectez-vous а votre compte</h4>
                        <form class="form p-t-20" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-email"></i></span>
                                    </div>
                                    <input id="email" type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Email" >
                                    
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="pwd1">mot passe</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="ti-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
                                    
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="checkbox1"> Remember me </label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button class="genric-btn success-border circle arrow">connexion<span
                                        class="lnr lnr-arrow-right"></span></button>

                                </div>
                            </div>
                            <br>
                            <div class="form-group m-b-0">
                                <div class="col-sm-12 text-center">
                                    <p>Vous n'avez pas de compte?<a href="{{ url('/register') }}" class="text-info m-l-5"><b>S'inscrire</b></a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================ contact section end ================= -->
 
<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('../user/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('../user/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('../user/js/popper.min.js')}}"></script>
        <script src="{{asset('../user/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('../user/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('../user/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('../user/js/slick.min.js')}}"></script>
        <script src="{{asset('../user/js/price_rangs.js')}}"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('../user/js/wow.min.js')}}"></script>
		<script src="{{asset('../user/js/animated.headline.js')}}"></script>
        <script src="{{asset('../user/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('../user/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{asset('../user/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('../user/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('../user/js/contact.js')}}"></script>
        <script src="{{asset('../user/js/jquery.form.js')}}"></script>
        <script src="{{asset('../user/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('../user/js/mail-script.js')}}"></script>
        <script src="{{asset('../user/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('../user/js/plugins.js')}}"></script>
        <script src="{{asset('../user/js/main.js')}}"></script>
        <!--Custom JavaScript -->
        <script type="text/javascript">
            $(function() {
                $(".preloader").fadeOut();
            });
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
            // ============================================================== 
            // Login and Recover Password 
            // ============================================================== 
            $('#to-recover').on("click", function() {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });
        </script>
        
    </body>
    
    </html>