<?php
	use Illuminate\Database\Query\Builder;
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Edit Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('../user/img/favicon.ico')}}">
        <meta name="csrf_token" content="{{ csrf_token()}}">
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
		<link rel="stylesheet" href="{{ asset('../assets/css/cs.css') }}">
		<link href="{{asset('../dist/css/select2.min.css')}}" rel="stylesheet">
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
		<div class="header-area header-transparrent">
			<div class="headder-top header-sticky">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3 col-md-2">
							<!-- Logo -->
							<div class="logo">
								<a href="{{url('index')}}"><img src="../user/img/logo/co1.png" width="60%" height="100%" alt=""></a>
							</div> 
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="menu-wrapper">
								<!-- Main-menu -->
								<div class="main-menu">
									<nav class="d-none d-lg-block">
										<ul id="navigation">
											<li><a href="{{url('/')}}">Accueil</a></li>
											<li><a href="{{url('publication')}}">Publication</a></li>
											<li><a href="{{url('idée')}}">Idée</a></li>
											<li><a href="{{url('signal')}}">Signal</a></li>
											<li><a href="#">Favoris</a></li>
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
        <!-- Header End -->
    </header>
    <main>
		<!-- slider Area End-->
        <!-- Our Services Start --><br><br>
        <div class="our-services section-p-3">
			<div class="container-fluid p-0">
				<div class="row">
					<div class="col-md-3 col-xl-2">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title mb-0">Profile Settings</h5>
							</div>
							<div class="list-group list-group-flush" role="tablist">
								<a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
									Account
								</a>
								<a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
									Password
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-xl-10">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="account" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title mb-0">Public info</h5>
									</div>
									<div class="card-body">
										<form action="{{url('user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
											{{method_field('put')}}
											{{csrf_field()}}
											<div class="row">
												<div class="col-md-8">
													<div class="form-row">
														<div class="form-group col-md-6">
															<label >Profession</label>
															<select class="form-select {{$errors->has('pro_id') ? 'is-invalid' : ''}}" name="pro_id" value="{{$user->pro_id}}">
																@foreach ($profs as $p)
																	<option value="{{$p->id}}" {{ $p->id == $user->pro_id ? 'selected' : '' }}>{{$p->nom}}</option>
																@endforeach
															</select>
														</div>
														<div class="form-group col-md-6">
															<label >Commune</label>
															<select class="form-select {{$errors->has('com_id') ? 'is-invalid' : ''}}" name="com_id" value="{{$user->com_id}}">
																@foreach ($communes as $c)
																	<option value="{{$c->id}}" {{ $c->id == $user->com_id ? 'selected' : '' }}>{{$c->nom}}</option>
																@endforeach
																@if ($errors->has('com_id'))
																	<span class="help-block text-danger">
																		<strong>{{ $errors->first('com_id') }}</strong>
																	</span>
																@endif
															</select>
														</div>
													</div>
													<div class="form-group ">
														<label>Maladie(s)</label>
														<select class="form-select select2-multi" name="tags[]" multiple="multiple">
															@foreach($maladies as $mal)
																<option value="{{ $mal->id }}">{{ $mal->nom }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="text-center">
													@if($user->image)
														<img alt="Charles Hall" src="{{asset('/'.$user->image)}}" class="rounded-circle img-responsive mt-2 " width="128" height="128" />
													@else 
														<img src="{{asset('frontend/images/avatar.jpeg')}}" class="rounded-circle img-responsive mt-2 " alt="Avatar" width="128" height="128"/>
													@endif 
														<div class="mt-2">
															<button class="genric-btn primary" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-upload"></i> Upload</button>                          
															<input class="file-upload-input" type="file" name="image" >
														</div>
														<small>For best results, use an image at least 128px by 128px in .jpg format</small>
													</div>
												</div>
											</div>
											<button type="submit" class="genric-btn primary">Enregitrer</button>
										</form>
									</div>
								</div>
								<br>
								<div class="card">
									<div class="card-body">
										<h5 class="card-title mb-0">Private info</h5>
									</div>
									<div class="card-body">
										<form action="{{ url('user/'.$user->id.'/privateinfo') }}" method="POST">
											{{method_field('put')}}
											{{csrf_field()}}
											<div class="form-row">
												<div class="form-group col-md-6">
													<label >Nom</label>
													<input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" value="{{ $user->nom }}" name="nom" placeholder="nom">
													@if ($errors->has('nom'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('nom') }}</strong>
														</span>
													@endif
												</div>
												<div class="form-group col-md-6">
													<label >Prénom</label>
													<input type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" value="{{ $user->prenom }}" name="prenom" placeholder="prénom">
													@if ($errors->has('prenom'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('prenom') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" name="email" placeholder="Email">
												@if ($errors->has('email'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('email') }}</strong>
													</span>
												@endif
											</div>
											<button type="submit" class="genric-btn primary">Enregitrer</button>
										</form>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="password" role="tabpanel">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Password</h5>
										<form action="{{ url('user/'.$user->id.'/password') }}" method="POST">
											{{method_field('put')}}
											{{csrf_field()}}
											<div class="form-group">
												<label for="inputPasswordNew">Mot de passe</label>
												<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" id="inputPasswordNew">
												@if ($errors->has('password'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputPasswordNew2">Confirmer mot de passe</label>
												<input name="password_confirmation" type="password"  class="form-control form-control-danger" id="inputPasswordNew2">
												@if ($errors->has('password_confirmation'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('password_confirmation') }}</strong>
													</span>
												@endif
											</div>
											<button type="submit" class="genric-btn primary">Enregitrer</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                             <div class="footer-tittle">
                                 <h4>A propos</h4>
                                 <div class="footer-pera">
                                     <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.</p>
                                </div>
                             </div>
                         </div>

                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                    <p>Addresse :Your address goes
                                        here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : info@colorlib.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Lien</h4>
                                <ul>
                                    <li><a href="#">Accueil</a></li>
                                    <li><a href="#"> Publication</a></li>
                                    <li><a href="#">Idée</a></li>
                                    <li><a href="#">Signal</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <ul>
                                    <li><a href="#">S'inscrir</a></li>
                                    <li>
                                <div class="footer-pera footer-pera2">
                                 <p>Connecter</p>
                             </div>
                             <!-- Form -->
                             <div class="footer-form " >
                                 <div id="mc_embed_signup">
                                     <form action="" method="">
                                            <div class="form-group d-flex">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" onkeyup="" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-envelope"></span>
                                                    </div>
                                              </div>
                                            </div>
                                            <div class="form-group d-flex">
                                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mot Pass" onkeyup="" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group switch-wrap d-flex">
                                                <p>S'enregistrer</p>&nbsp;&nbsp;&nbsp;
                                                <div class="primary-checkbox">
                                                    <input type="checkbox" id="default-checkbox">
                                                    <label for="default-checkbox"></label>
                                                </div>
                                            </div>                    
                                            <div class="text-center" >
                                                    <button type="submit" class="btn head-btn2" value="login" name="submit" id="login" disabled>Connecter</button>                
                                            </div>
                                      </form>
                                 </div>
                             </div>
                            </div>
                        </li>
                    </ul>
                        </div>
                    </div>
                </div>
               <!--  -->
               <!--div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        
                        <div class="footer-logo mb-20">
                        <a href="index.html"><img src="../user/img/logo/logo2_footer.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Talented Hunter</p>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
               </div-->
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

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
		<script src="{{ asset('../dist/js/select2.min.js') }}"></script>
		<script type="text/javascript">
			$('.select2-multi').select2();
			$('.select2-multi').select2().val({!! json_encode($user->maladies()->allRelatedIds()) !!}).trigger('change');
		</script>
		
	</body>
	
</html>
