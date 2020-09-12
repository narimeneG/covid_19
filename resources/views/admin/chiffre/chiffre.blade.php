@extends('layouts.admin')

@section('titre')
AdminKit Demo - chiffres Template
@endsection

@section('active5')
	active
@endsection

@section('content')
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Chiffre</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Chiffres</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row card-footer clearfix">
			<div class="col-10"><strong>La liste des chiffres</strong></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal2"><i class="fas fa-plus"></i> Add item</button>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
				<div class="card-body">
					<table id="example3" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width:5%;text-align: center;">id</th>
								<th style="width:10%;text-align: center;">Nbr de malades</th>
								<th style="width:10%;text-align: center;">Nbr de guéries</th>
								<th style="width:10%;text-align: center;">Nbr de morts</th>
								<th style="width:10%;text-align: center;">Wilaya</th>
								<th style="width:10%;text-align: center;">Date</th>
								<th style="width:10%;text-align: center;">Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($chiffres as $c)
							<tr id="chiffre_id_{{ $c->id }}">
								<td style="text-align: center;">{{ $c->id }}</td>
								<td style="text-align: center;">{{ $c->nbrmal }}</td>
								<td style="text-align: center;">{{ $c->nbrgue }}</td>
								<td style="text-align: center;">{{ $c->nbrmort }}</td>
								@if($c->wilaya_id != null) <td style="text-align: center;">{{$c->wilaya->nom}}</td> @else <td></td> @endif
								<td style="text-align: center;">{{ $c->date }}</td>
								<td class="table-action " style="text-align: center;">
									<button class="btn btn-warning m-0" data-cid="{{ $c->id }}" data-mal="{{ $c->nbrmal }}" data-gue="{{ $c->nbrgue }}" data-mort="{{ $c->nbrmort }}" data-dat="{{ $c->date }}" data-mywilaya="{{ $c->wilaya->nom }}" data-wilayaid="{{ $c->wilaya_id }}" data-toggle="modal" data-target="#modal1" onclick=""><i class="align-middle" data-feather="edit-2"></i></button>
									<button class="btn btn-danger m-0"data-cid="{{ $c->id }}" data-toggle="modal" data-target="#modal3" onclick=""><i class="align-middle" data-feather="trash-2"></i></button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!-- modal add cas-->
	<div id="modal2" class="modal fade" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header alert-info">
						<h4 class="modal-title">Les nouveaux cas</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/chiffres')}}" method="post">
      				{{csrf_field()}}
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-6">
								<label>Nbr de malades</label>
								<input type="text" class="form-control " name="nbrmal" placeholder="Nombre des nouveaux cas">
							</div>
							<div class='col-md-6'>
								<label >Nbr de guéries</label>
								<input type="text" class="form-control" name="nbrgue" placeholder="Nombre des gueries">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label >Nbr de morts</label>
								<input type="text" class="form-control" name="nbrmort" placeholder="Nombre des morts">
							</div>
							<div class='col-md-6'>
								<label for="start">Date:</label>
								<input type="date" name="date" class="form-control" name="trip-start" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
							</div>
						</div>
						<div class='form-row'>
							<label>Wilayas</label>
								<select class="form-control" name="wilaya_id" value="{{old('wilaya_id')}}" required>
									@foreach ($wilayas as $w)
										<option value="{{$w->id}}">{{ $w->nom }}</option>
									@endforeach
								</select>
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

<!-- modal add cas-->
	<div id="modal1" class="modal fade" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header alert-warning">
						<h4 class="modal-title">modifier les cas</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/chiffres')}}" method="post">
					{{method_field('put')}}
					{{csrf_field()}}
					<div class="modal-body">
					<input type="hidden" name="chiffre_id" id="c_id" value="">
						<div class="form-row">
							<div class="col-md-6">
								<label>Nbr de malades</label>
								<input type="text" class="form-control " name="nbrmal" id="nbrmal" placeholder="Nombre des nouveaux cas">
							</div>
							<div class='col-md-6'>
								<label >Nbr de guéries</label>
								<input type="text" class="form-control" name="nbrgue" id="nbrgue" placeholder="Nombre des gueries">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label >Nbr de morts</label>
								<input type="text" class="form-control" name="nbrmort" id="nbrmort" placeholder="Nombre des morts">
							</div>
							<div class='col-md-6'>
								<label for="start">Date:</label>
								<input type="date" name="date" class="form-control" name="trip-start" id="date" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
							</div>
						</div>
						<div class="form-row">
							<label>Wilayas</label>
								<select class="form-control" name="wilaya_id" id="wilaya_id" value="{{old('wilaya_id')}}" required>
									@foreach ($wilayas as $w)
										<option value="{{$w->id}}">{{ $w->nom }}</option>
									@endforeach
								</select>
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
<!--  modal supp-->
	<div id="modal3" class="modal fade" role="dialog">
			<div class="modal-dialog">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header alert-danger">
						<h4 class="modal-title">supprimer les cas</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{route('admin/chiffres')}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE')}}
					<div class="modal-body">
						vous etes sur de supprimer
						<input type="hidden" name="chiffre_id" id="c_id" value="">
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
				var m = button.data('mal') 
				var c_id = button.data('cid')
				var g = button.data('gue') 
				var mort = button.data('mort')
				var d = button.data('dat')
				var wilaya = button.data('mywilaya') 
				var w_id = button.data('wilayaid')
				alert(""+wilaya); 
				var modal = $(this)

				modal.find('.modal-body #nbrmal').val(m);
				modal.find('.modal-body #c_id').val(c_id);
				modal.find('.modal-body #nbrgue').val(g);
				modal.find('.modal-body #nbrmort').val(mort);
				modal.find('.modal-body #date').val(d);
				modal.find('.modal-body #wilaya_id').val(w_id);
		})


		$('#modal3').on('show.bs.modal', function (event) {

				var button = $(event.relatedTarget) 

				var c_id = button.data('cid') 
				var modal = $(this)

				modal.find('.modal-body #c_id').val(c_id);
		})

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