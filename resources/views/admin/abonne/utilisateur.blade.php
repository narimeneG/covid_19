@extends('layouts.admin')

@section('titre')
AdminKit Demo - utilisateurs Template
@endsection

@section('active7')
	active
@endsection

@section('content')
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Citoyen</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Citoyens</li>
					</ol>
				</nav>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
				<div class="card">
						<table id="example3" class="table table-striped table-hover">
								<thead>
									<tr class="text-center">
										<th>Nom</th>
										<th>Proffession</th>
										<th>Maladie</th>
										<th>Commune</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
										<tr class="text-center">
											<td>
												@if($user->image)
													<img src="{{asset('/'.$user->image)}}" width="48" height="48" class="rounded-circle mr-2" alt="user">
												@else 
													<img src="{{asset('frontend/images/avatar.jpeg')}}" width="48" height="48" class="rounded-circle mr-2" alt="user" >
												@endif 
												{{ $user->nom }} {{ $user->prenom }} 
											</td>
											<td>{{ $user->prof->nom }}</td>
											<td>
												@foreach($user->maladies as $m)
													{{ $m->nom}}<br>
												@endforeach</p>
											</td>
											<td>{{ $user->commune->nom }}</td>
											<td>{{ $user->email }}</td>
											<td>
												<button class="btn btn-info m-0" title="visualiser"><a href="{{url('admin/utilisateur/'.$user->id.'/profile')}}"><i class="align-middle" data-feather="eye"></i></a></button>
											</td>
										</tr>
									@endforeach
								</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
	<script>
		$(function () {
			$('#example3').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
@endsection