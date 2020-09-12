<div class="header-area header-transparrent">
    <div class="headder-top header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-2">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{url('/')}}" class="logo1"><h3>Coronavirus</h3></a>
                    </div> 
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="menu-wrapper">
                        <!-- Main-menu -->
                        <div class="main-menu">
                            <nav class="d-none d-lg-block">
                                <ul id="navigation">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('publication')}}">Publication</a></li>
                                    <li><a href="{{url('idée')}}">Idée</a></li>
                                    <li><a href="{{url('signal')}}">Signal</a></li>
                                    <li><a href="#">Page</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="single-blog.html">Blog Details</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="job_details.html">job Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>          
                        <!-- Header-btn -->
                            @if (Route::has('login'))
                                <div class="header-btn d-none f-right d-lg-block">
                                    @auth
                                    <ul>
                                        <li class="nav-item dropdown u-pro">
                                            <a class="nav-link dropdown-toggle waves-effect waves-white profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth::user()->image)
                                                <img src="{{'/'.Auth::user()->image}}" width="50" height="50"  class="img-fluid rounded-circle mb-2"> 
                                            @else 
                                                <img src="{{asset('frontend/images/avatar.jpeg')}}" width="50" height="50"  class="img-fluid rounded-circle mb-2">
                                            @endif
                                                <span class="hidden-md-down text-dark">{{Auth::user()->nom}} {{Auth::user()->prenom}} &nbsp;<i class="fa fa-angle-down"></i></span> 
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                                <!-- text-->
                                                <a href="{{url('user/'.Auth::user()->id.'/profile')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                                <!-- text-->
                                                <div class="dropdown-divider"></div>
                                                <!-- text-->
                                                <a href="{{url('user/'.Auth::user()->id.'/edit')}}" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                                <!-- text-->
                                                <div class="dropdown-divider"></div>
                                                <!-- text-->
                                                <a href="{{ url('user/logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                                <!-- text-->
                                            </div>
                                        </li>
                                    </ul>
                                        <!--a href="{{ url('user/logout') }}" class="btn head-btn2">Logout</a-->
                                    @else
                                        <a href="{{ url('/login') }}" class="btn head-btn2">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ url('/register') }}" class="btn head-btn1">Register</a>
                                        @endif
                                    @endauth  
                                </div>
                            @endif
                     </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>