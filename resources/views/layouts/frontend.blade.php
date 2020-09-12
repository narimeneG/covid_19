<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('../user/img/favicon.ico')}}">
        <meta name="csrf_token" content="{{ csrf_token()}}">
        @include('layouts.user._stylesheet')
		<!-- CSS here -->
            
   </head>
   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('../user/img/logo/logo1.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('layouts.user.navbar')
        <!-- Header End -->
    </header>

    <div class="slider-area ">
        <!-- Mobile Menu -->
        <!-- main content-->
        @yield('content')
        
                <!-- Siderbar-->
                
            </div>
        </div>
    </section>
    @include('layouts.user.footer')

    @include('layouts.user._scripts')
        
    </body>
</html>