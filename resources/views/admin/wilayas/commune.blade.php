@extends('layouts.admin')

@section('titre')
AdminKit Demo - Communes Template
@endsection

@section('active9')
	active
@endsection

@section('content')
	<!-- content main-->
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Commune</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Communes</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--tableaux des communes-->
		<div class="row card-footer clearfix">
			<div class="col-10"><strong>Les Communes </strong></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus"></i> Add item</button>
		</div>
		<br>
		<div class="row">
			<div class="col-2 "></div>
			<div class="col-8 ">
				<div class="card-body">
					<table id="example2" class="table table-bordered table-striped">
						<thead>
							<tr style="text-align: center;">
								<th style="width:5%;">id</th>
								<th style="width:10%;">nom</th>
								<th style="width:10%;">Wilaya</th>
								<th style="width:5%;">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($communes as $c)
							<tr style="text-align: center;">
								<td>{{ $c->id }}</td>
								<td>{{ $c->nom }}</td>
								<!--td style="text-align: center;">{{ $c->wilaya_id }}</td-->
								@if($c->wilaya_id != null) <td>{{$c->wilaya->nom}}</td> @else <td></td> @endif
								<td class="table-action">
									<button class="btn btn-warning m-0" data-mynom="{{ $c->nom }}" data-cid="{{ $c->id }}" data-mywilaya="{{ $c->wilaya->nom }}" data-wilayaid="{{ $c->wilaya_id }}" data-toggle="modal" data-target="#modal4"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button class="btn btn-danger m-0" data-cid="{{ $c->id }}" data-toggle="modal" data-target="#modal3"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<!-- Modal commune-->
<div id="modal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header alert-info">
				  <h5 class="modal-title">Nouvelle commune</h5>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{route('admin/communes')}}" method="post">
      		{{csrf_field()}}
				<div class="modal-body">
					<div class="form-row">
						<div class="col-md-6">
							<label >nom</label>
								<input type="text" class="form-control" name="nom" placeholder="La commune">
							</div>
							<div class='col-md-6'>
								<label>Wilayas</label>
									<select class="form-control" name="wilaya_id" value="{{old('wilaya_id')}}" required>
										@foreach ($wilayas as $w)
											<option value="{{$w->id}}">{{ $w->nom }}</option>
										@endforeach
									</select>
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

  <!-- Modal wilaya-->
  	<div id="modal4" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  	<div class="modal-content">
				<div class="modal-header alert-warning">
				  	<h5 class="modal-title" >Modifer Commune</h5>
			  		<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/communes')}}" method="post">
					{{method_field('put')}}
					{{csrf_field()}}
					<div class="modal-body">
						<input type="hidden" name="commune_id" id="c_id" value="">
						<div class="form-row">
							<div class="col-md-6">
								<label >nom</label>
								<input type="text" class="form-control" name="nom" id="nom" placeholder="La commune">
							</div>
							<div class='col-md-6'>
								<label>Wilayas</label>
								<select class="form-control" name="wilaya_id" id="wilaya_id" value="{{$c->wilaya_id}}">
									@foreach ($wilayas as $w)
										<option value="{{$w->id}}">{{ $w->nom }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
					<button type="submit" class="btn btn-primary">modifier</button>
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
						<h4 class="modal-title">supprimer la Commune</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/communes')}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
						<div class="modal-body">
							<p>supprimer ........</p>
							<input type="hidden" name="commune_id" id="c_id" value="">		
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
		$(function () {
			$('#example1').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			});
			$('#example2').DataTable({
			"autoWidth": false,
			"responsive": true,
			});
		});
	</script>
	
	<script>
		$('#modal4').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var nom = button.data('mynom') 
				var c_id = button.data('cid')
				var wilaya = button.data('mywilaya') 
				var w_id = button.data('wilayaid')
				alert(""+wilaya); 
				var modal = $(this)

				modal.find('.modal-body #nom').val(nom);
				modal.find('.modal-body #c_id').val(c_id);
				modal.find('.modal-body #wilaya_id').val(w_id);
		})


		$('#modal3').on('show.bs.modal', function (event) {

				var button = $(event.relatedTarget) 

				var c_id = button.data('cid') 
				var modal = $(this)

				modal.find('.modal-body #c_id').val(c_id);
		})
	</script>

@endsection

           
	
 
	  
	
	  

