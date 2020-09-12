@extends('layouts.admin')

@section('titre')
AdminKit Demo - Admins settings Template
@endsection



@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Settings</h1>
			<div class="row">
				<div class="col-md-3 col-xl-2">
					<div class="card">
						<div class="card-header">
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
								<div class="card-header">
									<h5 class="card-title mb-0">Public info</h5>
								</div>
								<div class="card-body">
									<form action="{{url('admin/'.$admin->id)}}" method="POST" enctype="multipart/form-data">
										{{method_field('put')}}
										{{csrf_field()}}
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label>Username</label>
													<input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $admin->username }}" id="username" name="username" placeholder="Username">
													@if ($errors->has('username'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('username') }}</strong>
														</span>
													@endif
												</div>
												<div class="form-group">
													<label >Job</label>
													<input type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" value="{{ $admin->job }}" id="job" name="job" placeholder="Username">
													@if ($errors->has('job'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('job') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="col-md-4">
												<div class="text-center">
												@if($admin->image)
													<img alt="Charles Hall" src="{{asset('/'.$admin->image)}}" class="rounded-circle img-responsive mt-2 " width="128" height="128" />
												@else 
													<img src="{{asset('frontend/images/avatar.jpeg')}}" class="rounded-circle img-responsive mt-2 " alt="Avatar" width="128" height="128"/>
												@endif 
													<div class="mt-2">
														<button class="btn btn-primary" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-upload"></i> Upload</button>                          
														<input class="file-upload-input" type="file" name="image" >
														<!--span class="btn btn-primary" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-upload"></i> Upload</span-->
													</div>
													<small>For best results, use an image at least 128px by 128px in .jpg format</small>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary">Enregitrer</button>
									</form>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Private info</h5>
								</div>
								<div class="card-body">
									<form action="{{url('admin/'.$admin->id.'/privateinfo')}}" method="POST">
										{{method_field('put')}}
										{{csrf_field()}}
										<div class="form-row">
											<div class="form-group col-md-6">
												<label >Nom</label>
												<input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" value="{{ $admin->nom }}" name="nom" placeholder="nom">
												@if ($errors->has('nom'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('nom') }}</strong>
													</span>
												@endif
											</div>
											<div class="form-group col-md-6">
												<label >Prénom</label>
												<input type="text" class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }}" value="{{ $admin->prenom }}" name="prenom" placeholder="prénom">
												@if ($errors->has('prenom'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('prenom') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $admin->email }}" name="email" placeholder="Email">
											@if ($errors->has('email'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
										<!--div class="form-group">
											<label for="inputAddress">Address</label>
											<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
										</div>
										<div class="form-group">
											<label for="inputAddress2">Address 2</label>
											<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
										</div-->
										<button type="submit" class="btn btn-primary">Enregitrer</button>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="password" role="tabpanel">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Password</h5>
									<form action="{{url('admin/'.$admin->id.'/password')}}" method="POST">
										{{method_field('put')}}
										{{csrf_field()}}
										<!--div class="form-group">
											<label for="inputPasswordCurrent">Current password</label>
											<input type="password" class="form-control" id="inputPasswordCurrent">
											<small><a href="#">Forgot your password?</a></small>
										</div-->
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
										<button type="submit" class="btn btn-primary">Enregitrer</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
@endsection