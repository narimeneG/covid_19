@extends('layouts.admin')

@section('titre')
AdminKit Demo - Admins Template
@endsection

@section('active10')
	active
@endsection

@section('content')
	<!-- content main-->
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Admin</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Admins</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--tableaux des admins-->
		<div class="row card-footer clearfix">
			<div class="col-10"></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus"></i> Ajouter</button>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
				<div class="card">
					<table id="example2" class="table table-striped table-hover">
						<thead>
							<tr class="text-center">
								<th>Nom</th>
								<th>Pseudo</th>
								<th>Job</th>
								<th>émail</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($admins as $a)
							<tr class="text-center">
								<td>
								@if($a->image)
									<img src="{{asset('/'.$a->image)}}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar">
								@else 
									<img src="{{asset('frontend/images/avatar.jpeg')}}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar" >
								@endif
								{{ $a->nom }} {{ $a->prenom }} 
								</td>
								<td style="text-align: center;">{{ $a->username }}</td>
								<td style="text-align: center;">{{ $a->job }}</td>
								<td style="text-align: center;">{{ $a->email }}</td>
								<td class="table-action " style="text-align: center;">
									<button class="btn btn-info m-0" title="visualiser"><a href="{{url('admin/'.$a->id.'/show')}}"><i class="align-middle text-white" data-feather="eye"></i></a></button>
									<button class="btn btn-warning m-0" title="modifier" data-toggle="modal" data-target="#modal1" onclick=""><i class="align-middle" data-feather="edit-2"></i></button>
									<button class="btn btn-danger m-0" title="Suprimer"  data-aid="{{$a->id}}" data-toggle="modal" data-target="#modal3"><i class="align-middle" data-feather="trash-2"></i></button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!-- Modal add admin-->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-info">
			<h4 class="modal-title" id="customerCrudModal">nouvel admin</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('admin/Admins')}}" method="post">
      		{{csrf_field()}}
	    <div class="modal-body">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label >Nom</label>
					<input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" value="{{old('nom')}}" name="nom" placeholder="nom" required>
					@if ($errors->has('nom'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('nom') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group col-md-6">
					<label >Prénom</label>
					<input type="text" class="form-control {{ $errors->has('prénom') ? ' is-invalid' : '' }}" value="{{old('prenom')}}" name="prenom" placeholder="prénom" required>
					@if ($errors->has('prenom'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('prenom') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label >Pseudo</label>
					<input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{old('username')}}" name="username" placeholder="pseudo" required>
					@if ($errors->has('username'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group col-md-6">
					<label >job</label>
					<input type="text" class="form-control {{ $errors->has('job') ? ' is-invalid' : '' }}" value="{{old('job')}}" name="job" placeholder="job" required>
					@if ($errors->has('job'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('job') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email')}}" name="email" placeholder="Email" required>
				@if ($errors->has('email'))
					<span class="help-block text-danger">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputPasswordNew">Mot de passe</label>
					<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" id="inputPasswordNew">
					@if ($errors->has('password'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group col-md-6">
					<label for="inputPasswordNew2">Confirmer mot de passe</label>
					<input name="password_confirmation" type="password"  class="form-control form-control-danger" id="inputPasswordNew2">
					@if ($errors->has('password_confirmation'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('password_confirmation') }}</strong>
						</span>
					@endif
				</div>
			</div>
	    </div>
	    <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
	        <button type="submit" class="btn btn-primary">enregistrer</button>
	    </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal suppression -->
<div id="modal3" class="modal fade" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header alert-danger">
						<h4 class="modal-title">supprimer Admin</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/Admins')}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
						<div class="modal-body">
							<p>supprimer ........</p>
							<input type="hidden" name="admin_id" id="a_id" value="">		
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
							<button type="submit" class="btn btn-danger"><i class="align-middle" data-feather="trash-2"></i> oui</button>
						</div>
				</form>
			  </div>
			</div>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
	<script>
	$('#modal3').on('show.bs.modal', function (event) {

				var button = $(event.relatedTarget) 

				var a_id = button.data('aid') 
				var modal = $(this)

				modal.find('.modal-body #a_id').val(a_id);
		})
	</script>
@endsection

           
	
 
	  
	
	  

