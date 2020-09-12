@extends('layouts.admin')

@section('titre')
AdminKit Demo - signals Template
@endsection

@section('active4')
	active
@endsection

@section('content')
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Signal</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Signals</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--div class="row card-footer clearfix">
			<div class="col-10"><strong>La liste des signalements</strong></div>
		</div-->
		<br>
		<div class="row">
			<div class="col-12 ">
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th style="width:5%;text-align: center;">id</th>
								<th style="width:10%;text-align: center;">Adresse</th>
								<th style="width:5%;text-align: center;">Wilaya</th>
								<th style="width:10%;text-align: center;">Date</th>
								<th style="width:5%;text-align: center;">Etat</th>
								<th style="width:15%;text-align: center;">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($signals as $s)
								<tr>
									<td style="text-align: center;">{{$s->id}}</td>
									<td style="text-align: center;">{{$s->localisation}}</td>
									<td style="text-align: center;">{{$s->wilaya->nom}}</td>
									<td style="text-align: center;">{{$s->date}}</td>
									<td style="text-align: center;"><span class="label label-danger">{{$s->etat}}</span></td>
									<td class="table-action">
										<button type="submit" class="btn btn-outline-success m-0" data-sid="{{ $s->id }}" data-a="{{ $s->etat}}"><i class="fas fa-check"></i></button>
										<button class="btn btn-outline-danger m-0" data-sid="{{ $s->id }}" data-r="{{ $s->etat}}"><i class="fas fa-times"></i></button>
										<button class="btn btn-info m-0" title="visualiser"><a href="{{url('admin/signal/'.$s->id.'/show')}}"><i class="align-middle text-white" data-feather="eye"></i></a></button>
										<button class="btn btn-warning m-0" data-sid="{{ $s->id }}" data-cont="{{ $s->contenu }}" data-adr="{{$s->localisation}}" data-cid="{{ $s->cat_id }}"  data-wid="{{ $s->wilaya_id }}" data-toggle="modal" data-target="#modal1" onclick=""><i class="align-middle" data-feather="edit-2"></i></button>
										<button class="btn btn-danger m-0" data-sid="{{ $s->id }}" data-toggle="modal" data-target="#modal2" onclick=""><i class="align-middle" data-feather="trash-2"></i></button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal modifier idée-->
	<div id="modal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header alert-warning">
				  <h5 class="modal-title" >modifier l'Idée</h5>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{url('admin/signals')}}" method="post">
				{{method_field('put')}}
				{{csrf_field()}}
				<div class="modal-body">
					<input type="hidden" name="signal_id" id="s_id" value="">
							<div class="form-row">
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
								<div class='col-md-6'><label>Wilaya</label>
									<select class="form-control {{$errors->has('wilaya_id') ? 'is-invalid' : ''}}" name="wilaya_id" id="w_id">
										@foreach ($wilayas as $w)
											<option value="{{$w->id}}">{{$w->nom}}</option>
										@endforeach
										@if($errors->has('wilaya_id'))
                                    		<span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('wilaya_id')}}</strong>
                                            </span>
                                    	@endif
									</select>
								</div>
							</div>
							<div class="form-row">
								<label >Adresse</label>
								<input type="text" class="form-control {{$errors->has('adresse') ? 'is-invalid' : ''}}" name="localisation" id="localisation" required>
									@if($errors->has('adresse'))
                                		<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('adresse')}}</strong>
                                        </span>
                                	@endif
							</div>
							<div class="form-row">
								<label >Contenu</label>
								<textarea placeholder="saisir contenu du signal" name="contenu" id="contenu" class="form-control col-sm-12 rounded {{$errors->has('contenu') ? 'is-invalid' : ''}}"></textarea>
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
	<div id="modal2" class="modal fade" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header alert-danger">
						<h4 class="modal-title">supprimer le Signal</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/signals')}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
						<div class="modal-body">
							<p>supprimer ........</p>
							<input type="hidden" name="signal_id" id="s_id" value="">		
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
		$('#modal1').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var w_id = button.data('wid') 
				var s_id = button.data('sid')  
				var c = button.data('cont') 
				var a = button.data('adr') 
				var c_id = button.data('cid')  
				var modal = $(this)
			
				modal.find('.modal-body #s_id').val(s_id);
				modal.find('.modal-body #w_id').val(w_id);
				modal.find('.modal-body #contenu').val(c);
				modal.find('.modal-body #localisation').val(a);
				modal.find('.modal-body #c_id').val(c_id);
				
		})
		$('#modal2').on('show.bs.modal', function (event) {

				var button = $(event.relatedTarget) 

				var s_id = button.data('sid') 
				var modal = $(this)

				modal.find('.modal-body #s_id').val(s_id);
		})
	</script>
<script>
	var token = "{{ Session::token() }}";

	$('.btn-outline-success').on('click', function () {
		var signal_id = $(this).attr('data-sid');
		//idee_id = idee_id.slice(0, -2);
		var accepté = $(this).attr('data-a');
		alert(accepté+""+signal_id);

		$.ajax({
			type: 'POST',
			url: "{{ route('accepter') }}",
			data: {signal_id: signal_id, accepté: accepté, _token: token},

			success: function(data){
				//alert("ok");
				if(data.acpt == 1){
					location.reload();
				}
			}
		});
		
	});

	$('.btn-outline-danger').on('click', function () {
		var signal_id = $(this).attr('data-sid');
		//idee_id = idee_id.slice(0, -2);
		var r = $(this).attr('data-r');
		//alert(accepté);

		$.ajax({
			type: 'POST',
			url: "{{ route('refuser') }}",
			data: {signal_id: signal_id, réfusé: r, _token: token},

			success: function(data){
				//alert("ok");
				if(data.réfus == 1){
					location.reload();
				}
			}
		});
		
	});
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

