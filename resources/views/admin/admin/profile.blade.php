@extends('layouts.admin')
@section('titre')
AdminKit Demo - profile Template
@endsection

@section('active8')
	active
@endsection

@section('content')
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>{{ $admin->nom }} {{ $admin->prenom }}</strong> Profil</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/Admins')}}">Admins</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ $admin->nom }} {{ $admin->prenom }}</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xl-3">
				<div class="card mb-3">
					<div class="card-header">
						<h5 class="card-title mb-0">Profile Details</h5>
					</div>
					<div class="card-body text-center">
					@if($admin->image)
						<img src="{{asset('/'.$admin->image)}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
					@else 
						<img src="{{asset('frontend/images/avatar.jpeg')}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
					@endif 
						<h5 class="card-title mb-0">{{$admin->nom}} {{$admin->prenom}}</h5>
						<div class="text-muted mb-2">{{$admin->job}}</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-xl-9">
				<div class="card">
					<div class="card-header">

						<h5 class="card-title mb-0">Détails personnel</h5>
					</div>
					<div class="tab-content">
					
							<!--second tab-->
							<div class="tab-pane active" id="profile" role="tabpanel">
								<div class="card-body">
									<div class="row">
										<div class="col-md-3 col-xs-6 b-r"> <strong>Pseudo</strong>
											<br>
											<p class="text-muted">{{$admin->username}}</p>
										</div>
										<div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
											<br>
											<p class="text-muted">{{$admin->email}}</p>
										</div>
										<div class="col-md-3 col-xs-6"> <strong>Wilaya</strong>
											<br>
											<p class="text-muted">tlemcen</p>
										</div>
										<div class="col-md-3 col-xs-6 b-r"> <strong>Commune</strong>
											<br>
											<p class="text-muted">sidi said</p>
										</div>
									</div>

								</div>
							</div>
							
						</div>
				</div>
			</div>
		</div>

	</div>
@endsection