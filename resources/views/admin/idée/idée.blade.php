@extends('layouts.admin')

@section('titre')
AdminKit Demo - idées Template
@endsection

@section('active3')
	active
@endsection

@section('content')

<!-- content main-->
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Idées</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Idées</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--nouvelle idée--><br>
		<!--div class="row card-header clearfix">
			<div class="col-10"><strong>Les idées</strong></div>
		</div>
		<br-->
		<div class="row">
			<div class="col-12 ">
				<div class="card-body">
					<table id="example3" class="table table-bordered ">
						<thead>
							<tr style="text-align: center;">
								<th style="width:2%;">id</th>
								<th style="width:10%;">titre</th>
								<th style="width:5%;"><i class="align-middle text-secondary" data-feather="thumbs-up"></i></th>
								<th style="width:5%;"><i class="align-middle text-secondary" data-feather="thumbs-down"></i></th>
								<th style="width:10%;">catégorie</th>
								<th style="width:5%;">état</th>	
								<th style="width:15%">Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($idees as $c)
							<tr style="text-align: center;">
								<td>{{ $c->id }}</td>
								<td>{{ $c->titre }}</td>
									<?php
										$like_count = 0;
										$dislike_count = 0;
									?>
									@foreach ($c->likes as $like)
										<?php
											if($like->like == 1)
												$like_count++;
											
											if($like->like == 0)
												$dislike_count++;
										?>
									@endforeach
								<td>{{ $like_count }}</td>
								<td>{{ $dislike_count }}</td>
								@if($c->cat_id != null) <td>{{$c->cat->nom}}</td> @else <td></td> @endif
								<td ><span class="etat">{{ $c->etat }}</span></td>
								<td class="table-action">
									<button type="submit" class="btn btn-outline-success btn1 " data-iid="{{ $c->id }}_e" data-etat="{{ $c->etat }}"><i class="fas fa-check"></i></button>
									<button class="btn btn-info m-0" ><a href="{{url('admin/idée/'.$c->id.'/show')}}"><i class="align-middle text-white" data-feather="eye"></i></a></button>
									<button class="btn btn-warning m-0" data-iid="{{ $c->id }}" data-titre="{{ $c->titre }}" data-cont="{{ $c->contenu }}" data-cid="{{ $c->cat_id }}" data-nom="{{ $c->cat->nom }}" data-toggle="modal" data-target="#modal2"><i class="align-middle" data-feather="edit-2"></i></button>
									<button class="btn btn-danger m-0" data-iid="{{ $c->id }}" data-toggle="modal" data-target="#modal3"><i class="align-middle" data-feather="trash-2"></i></button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>			
    
	  <!-- Modal idée-->
	<div id="modal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header alert-warning">
				  <h5 class="modal-title" >modifier l'Idée</h5>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{url('admin/idées')}}" method="post">
				{{method_field('put')}}
				{{csrf_field()}}
				<div class="modal-body">
					<input type="hidden" name="idee_id" id="i_id" value="">
					<div class="form-row">
						<div class="col-md-6">
							<label>titre</label>
							<input type="text" class="form-control {{$errors->has('titre') ? 'is-invalid' : ''}}" name="titre" id="titre" placeholder="titre de l'idée">
								@if($errors->has('titre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titre')}}</strong>
                                    </span>
                                @endif						
						</div>
								<div class='col-md-6'><label>Catégorie</label>
									<select class="form-control {{$errors->has('cat_id') ? 'is-invalid' : ''}}" name="cat_id" id="c_id">
									@foreach ($categories as $cat)
										<option value="{{$cat->id}}">{{$cat->nom}}</option>
										@endforeach
										@if($errors->has('cat_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_id')}}</strong>
                                    </span>
                                @endif
										</select>
								</div>
							</div>
							<div class="form-row">
								<label >Contenu</label>
								<textarea placeholder="saisir contenu de l'idée" name="contenu" id="contenu" class="form-control col-sm-12 rounded {{$errors->has('contenu') ? 'is-invalid' : ''}}" ></textarea>
								@if($errors->has('contenu'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contenu')}}</strong>
                                            </span>
                                    @endif
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
				<form action="{{route('admin/idées')}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
						<div class="modal-body">
							<p>supprimer ........</p>
							<input type="hidden" name="idee_id" id="i_id" value="">		
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
			var title = button.data('titre') 
			var i_id = button.data('iid')  
			var c = button.data('cont') 
			var nom = button.data('nom')
			var c_id = button.data('cid')  
			var modal = $(this)
			
			modal.find('.modal-body #titre').val(title);
			modal.find('.modal-body #i_id').val(i_id);
			modal.find('.modal-body #titre').val(title);
			modal.find('.modal-body #contenu').val(c);
			modal.find('.modal-body #c_id').val(c_id);
			
	})
	$('#modal3').on('show.bs.modal', function (event) {

			var button = $(event.relatedTarget) 

			var i_id = button.data('iid') 
			var modal = $(this)

			modal.find('.modal-body #i_id').val(i_id);
	})
</script>
<script src="{{ asset('../assets/js/jquery.min.js' )}}"></script>
<script>
	var token = "{{ Session::token() }}";

	$('.btn1').on('click', function () {
		var idee_id = $(this).attr('data-iid');
		idee_id = idee_id.slice(0, -2);
		var etat = $(this).attr('data-etat');
		alert(idee_id);

		$.ajax({
			type: 'POST',
			url: "{{ route('accepte') }}",
			data: {idee_id: idee_id,etat: etat, _token: token},

			success: function(data){
				//alert("ok");
				if(data.e == 1){
					location.reload();
				}
				
			}
		});
		
	});
</script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
	$('#example3').DataTable({
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

