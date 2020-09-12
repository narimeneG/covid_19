@extends('layouts.admin')

@section('titre')
AdminKit Demo - wilayas Template
@endsection

@section('active6')
	active
@endsection

@section('content')
	<!-- content main-->
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Wilaya</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Wilayas</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--tableaux des wilayas-->
		<div class="row card-header clearfix">
			<div class="col-10"><strong>Les Wilayas</strong></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus"></i> Ajouter</button>
		</div>
		<br>
		<div class="row">
			<div class="col-2 "></div>
			<div class="col-8 ">
				<div class="card-body">
					<table id="example1" class="table table-bordered ">
						<thead>
							<tr style="text-align: center;">
								<th style="width:5%;">id</th>
								<th style="width:10%;">nom</th>
								<th style="width:5%;">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($wilayas as $w)
							<tr style="text-align: center;">
								<td>{{ $w->id }}</td>
								<td>{{ $w->nom }}</td>
								<td class="table-action">
									<button class="btn btn-warning m-0" title="modifier" data-mynom="{{ $w->nom }}" data-wid="{{ $w->id }}" data-toggle="modal" data-target="#modal2"><i class="align-middle" data-feather="edit-2" ></i></button>
									<button class="btn btn-danger m-0" title="Suprimer" data-wid="{{ $w->id }}" data-toggle="modal" data-target="#modal3"><i class="align-middle" data-feather="trash-2"></i></button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<!-- Modal wilaya-->
  	<div id="modal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  	<div class="modal-content">
				<div class="modal-header alert-info">
					<h5 class="modal-title" >Nouvelle Wilaya</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{url('admin/wilayas')}}" method="post">
					{{csrf_field()}}
					<div class="modal-body">
						<div class="form-row">
							<label class="col-sm-2 col-form-label">Wilaya</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nom" placeholder="nom de la Wilayas">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
						<button type="submit" class="btn btn-primary">mofidier</button>
					</div>
				</form>
		  	</div>
		</div>
	</div> 
	 
	<!-- Modal update wilaya-->
	<div id="modal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  	<div class="modal-content">
				<div class="modal-header alert-warning">
					<h4 class="modal-title" id="customerCrudModal">Modifier Wilayas</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{url('admin/wilayas')}}" method="post">
					{{method_field('put')}}
					{{csrf_field()}}
					<div class="modal-body">
						<input type="hidden" name="wilayas_id" id="w_id" value="">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Wilayas</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nom" id="nom">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
						<button type="submit" class="btn btn-primary" id="add">enregistrer</button>
					</div>
				</form>
		  	</div>
		</div>
	</div>
	
<!--Modal suppression -->
    <div id="modal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header alert-danger">
					<h4 class="modal-title">supprimer Wilayas</h4>
                  	<button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('admin/wilayas')}}" method="post">
					{{ csrf_field() }}
					{{ method_field('DELETE')}}
					<div class="modal-body">
						<p>supprimer ........</p>
						<input type="hidden" name="wilayas_id" id="w_id" value="">      
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
		$('#modal2').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var nom = button.data('mynom') 
				var w_id = button.data('wid') 
				var modal = $(this)

				modal.find('.modal-body #nom').val(nom);
				modal.find('.modal-body #w_id').val(w_id);
		})
		
		$('#modal3').on('show.bs.modal', function (event) {

				var button = $(event.relatedTarget) 

				var w_id = button.data('wid') 
				var modal = $(this)

				modal.find('.modal-body #w_id').val(w_id);
		})
	</script>
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
@endsection

           
	
 
	  
	
	  

