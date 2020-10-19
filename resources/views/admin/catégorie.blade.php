@extends('layouts.admin')

@section('titre')
AdminKit Demo - idées Template
@endsection

@section('active8')
	active
@endsection

@section('content')
<!-- content main-->
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Catégorie</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Catégories</li>
					</ol>
				</nav>
			</div>
		</div>
				<!--nouvelle catégorie-->
		<div class="row card-footer clearfix">
			<div class="col-10"><strong>Les catégories des idées</strong></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus"></i> Ajouter</button>
		</div>
			<br>
		<div class="row">
			<div class="col-2 "></div>
			<div class="col-8 ">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width:5%;text-align: center;">id</th>
								<th style="width:5%;text-align: center;">Categorie</th>
								<th style="width:5%;text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $c)
								<tr style="text-align: center;">
									<td>{{ $c->id }}</td>
									<td><a href="{{ url('admin/cateID/'.$c->id.'/show') }}"  class="text-dark">{{ $c->nom }}</a></td>
									<td class="table-action">
										<button class="btn btn-warning m-0" data-mynom="{{$c->nom}}" data-catid="{{$c->id}}" data-toggle="modal" data-target="#modal4"><i class="align-middle" data-feather="edit-2"></i></button>
										<button class="btn btn-danger m-0" data-catid="{{$c->id}}" data-toggle="modal" data-target="#modal3"><i class="align-middle" data-feather="trash-2"></i></button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>			
      
 <!-- Modal add catégarie-->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-info">
			<h4 class="modal-title" id="customerCrudModal">nouvelle Catégorie</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{route('admin/categories')}}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Catégorie</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nom"  placeholder="nom de la catégorie">
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
<!-- Modal update catégarie-->
<div id="modal4" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header alert-warning">
				  <h4 class="modal-title" id="customerCrudModal">modifier la Catégorie</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{route('admin/categories')}}" method="post">
      		{{method_field('put')}}
      		{{csrf_field()}}
			<div class="modal-body">
					<input type="hidden" name="category_id" id="cat_id" value="">
			  	<div class="form-group row">
					<label class="col-sm-2 col-form-label">Catégorie</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nom" id="nom">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
				<button type="submit" class="btn btn-primary" id="add">modifier</button>
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
						<h4 class="modal-title">supprimer la Catégorie</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/categories')}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
						<div class="modal-body">
							<p>supprimer ........</p>
							<input type="hidden" name="category_id" id="cat_id" value="">		
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
		$('#modal4').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var title = button.data('mynom') 
				var cat_id = button.data('catid') 
				var modal = $(this)

				modal.find('.modal-body #nom').val(title);
				modal.find('.modal-body #cat_id').val(cat_id);
		})


		$('#modal3').on('show.bs.modal', function (event) {

				var button = $(event.relatedTarget) 

				var cat_id = button.data('catid') 
				var modal = $(this)

				modal.find('.modal-body #cat_id').val(cat_id);
		})
	</script>
	
@endsection

