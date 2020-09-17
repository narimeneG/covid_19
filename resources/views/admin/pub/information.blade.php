@extends('layouts.admin')

@section('titre')
	Dashboard | information
@endsection

@section('active2')
	active
@endsection

@section('content')
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Iformation</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Iformations</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row card-footer clearfix">
			<div class="col-10"><strong>Les informations</strong></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal1" ><i class="fas fa-plus"></i> Add item</button>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
				<div class="card-body">
					<table id="example3" class="table table-bordered table-striped">
						<thead>
							<tr style="text-align:center;">
								<th style="width:5%;">id</th>
								<th style="width:15%;">Titre</th>
								<th style="width:5%;">Maladies</th>
								<th style="width:5%;">Profession</th>
								<th style="width:5%;">Wilaya</th>
								<th style="width:15%;">Source</th>
								<th style="width:15%">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($infos as $info)
							<tr style="text-align:center;">
								<td>{{ $info->id }}</td>
								<td>{{ $info->titre }}</td>
								@if($info->mal_id != null) <td>{{$info->maladie->nom}}</td> @else <td>Tous les maladies</td> @endif
								@if($info->pro_id != null) <td>{{$info->pro->nom}}</td> @else <td>NULL</td> @endif
								@if($info->wilaya_id != null) <td>{{$info->wilaya->nom}}</td> @else <td>NULL</td> @endif
								@if($info->sou_id != null) <td>{{$info->source->nom}}</td> @else <td></td> @endif
								<td class="table-action">
									<button class="btn btn-info m-0" title="visualiser"><a href="{{url('admin/pub/'.$info->id.'/show')}}"><i class="align-middle text-white" data-feather="eye"></i></a></button>
									<button class="btn btn-warning m-0"title="modifier" data-infoid="{{ $info->id }}" data-titre="{{ $info->titre }}"data-cont="{{ $info->contenu }}" data-sid="{{ $info->source_id }}" data-wid="{{ $info->wilaya_id }}" data-pid="{{ $info->profession_id }}"  data-mid="{{ $info->maladie_id }}" data-lien="{{ $info->lien }}" data-toggle="modal" data-target="#modal2"><i class="align-middle" data-feather="edit-2"></i></button>
									<button class="btn btn-danger m-0" title="supprimeer" data-toggle="modal" data-target="#modal3"><i class="align-middle" data-feather="trash-2"></i></button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Modal supprission -->
	<div id="modal3" class="modal fade" role="dialog">
				<div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					<!--div class="modal-header">
							<h4 class="modal-title">Modal Header</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div-->
					<div class="modal-body">
						supprimer.......
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
						<button type="button" class="btn btn-danger">oui</button>
					</div>
				  </div>
				</div>
			  </div>
	<!-- Modal add -->
	<div id="modal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header alert-primary">
					<h5 class="modal-title">Nouvelle publication</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="{{ route('admin/info')}}"  method="POST" data-toggle="validator" id="add">
				{{csrf_field()}} 
					<div class="modal-body">
						<div class="form-row">
							<div class='col-md-6'>
								<label>titre</label>
								<input type="text" class="form-control " name="titre" id="titre" placeholder="titre de l'information">
							</div>
							<div class='col-md-6'>
								<label>Profession</label>
								<select class="form-control" name="pro_id" id="p_id">
								@foreach($professions as $pro)
                                    <option value='{{ $pro->id }}'>{{ $pro->nom }}</option>
                                @endforeach
								</select>
							</div>			
						</div>       
						<div class="form-group ">
                            <label>Maladies</label>
                            <select class="form-control select2-multi"  name="mal" multiple="multiple">
                                @foreach($maladies as $mal)
                                    <option value='{{ $mal->id }}'>{{ $mal->nom }}</option>
                                @endforeach
                            </select>
                        </div>
						<div class="form-group ">
                            <label>Wilayas</label>
                            <select class="form-control select1-multi" name="wilaya_id" multiple="multiple">   
							@foreach($wilayas as $wil)
                                    <option value='{{ $wil->id }}'>{{ $wil->nom }}</option>
                                @endforeach      
                            </select>
                        </div>
						<div class="form-row">
							<label >Contenu</label>
							<textarea name="contenu" placeholder="Description " class="form-contro col-sm-12 rounded" rows="3" required></textarea>
						</div>
						<div class="form-group ">
							<label>Source</label>
							<select class="form-control" name="sou_id" id="s_id">
							@foreach($sources as $source)
                                    <option value='{{ $source->id }}'>{{ $source->nom }}</option>
                                @endforeach
							</select>
                        </div>
						<div class="form-group ">
									<label for="start">Date:</label>
									<input type="date" name="date" class="form-control" id="date" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
								</div>
						<div class="form-row">
							<label >Lien vidéo</label>
							<input type="text" class="form-control" id="lien" name="lien" placeholder="le lien">
						</div>
						<div class="form-row">
							<div class="">
								<div class="card-body">
									<label for="input-file-now">Photo</label>
									<input type="file" id="input-file-now" class="dropify" name="image"/>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						<button type="submit" class="btn btn-primary">Enregiter</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal modification-->	
	<div id="modal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header alert-primary">
					<h5 class="modal-title">Modifier la publication</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form  action="{{ route('admin/info')}}" method="post"  enctype="multipart/form-data">
				{{method_field('put')}}
				{{csrf_field()}}
					<div class="modal-body">
						<input type="hidden"  name="information_id" id="info_id" value="" >  
						<div class="form-row">
							<div class='col-md-6'>
								<label>titre</label>
								<input type="text" class="form-control " name="titre" id="titre" placeholder="titre de l'information">
							</div>
							<div class='col-md-6'>
								<label>Profession</label>
								<select class="form-control" name="pro_id" id="p_id">
								@foreach($professions as $pro)
                                    <option value='{{ $pro->id }}'>{{ $pro->nom }}</option>
                                @endforeach
								</select>
							</div>			
						</div>       
						<div class="form-group ">
                            <label>Maladies</label>
							<select class="form-control select2-multi" name="mal_id" id="m_id" multiple="multiple">
                                @foreach($maladies as $mal)
                                    <option value='{{ $mal->id }}'>{{ $mal->nom }}</option>
                                @endforeach
                            </select>
                        </div>
						<div class="form-group ">
                            <label>Wilayas</label>
                            <select class="form-control select1-multi" name="wilaya_id" id="w_id" multiple="multiple">   
							@foreach($wilayas as $wil)
                                    <option value='{{ $wil->id }}'>{{ $wil->nom }}</option>
                                @endforeach
                            </select>
                        </div>
						<div class="form-row">
							<label >Contenu</label>
							<textarea name="contenu" id="contenu" placeholder="Description " class="form-contro col-sm-12 rounded" rows="3" required></textarea>
						</div>
						<div class="form-group ">
							<label>Source</label>
							<select class="form-control" name="sou_id" id="s_id">
							@foreach($sources as $source)
                                    <option value='{{ $source->id }}'>{{ $source->nom }}</option>
                                @endforeach
							</select>
                        </div>
						<div class="form-row">
							<label >Lien vidéo</label>
							<input type="text" class="form-control" id="lien" name="lien" placeholder="le lien">
						</div>
						<div class="form-group ">
									<label for="start">Date:</label>
									<input type="date" name="date" class="form-control" id="date" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
								</div>
						<div class="form-row">
							<div class="">
								<div class="card-body">
									<label for="input-file-now">Photo</label>
									<input type="file" name="image" id="input-file-now" class="dropify" />
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						<button type="submit" class="btn btn-primary">Modifer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="{{ asset('../dist/js/parsley.min.js') }}"></script>
    <script src="{{ asset('../dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
		$('.select2-multi').select2();
	</script>

<script src="{{asset('js/app.js')}}"></script>
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
<script>

$('#modal2').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 
	var title = button.data('titre') 
	var contenu = button.data('cont') 
	var info_id = button.data('infoid') 
	var s_id = button.data('sid') 
	var w_id = button.data('wid') 
	var m_id = button.data('mid') 
	var p_id = button.data('pid') 
	var lien = button.data('lien') 
	alert(info_id);

	var modal = $(this)
	modal.find('.modal-body #titre').val(title);
	modal.find('.modal-body #info_id').val(info_id);
	modal.find('.modal-body #contenu').val(contenu);
	modal.find('.modal-body #lien').val(lien);
	modal.find('.modal-body #s_id').val(s_id);
	modal.find('.modal-body #w_id').val(w_id);
	modal.find('.modal-body #m_id').val(m_id);
	modal.find('.modal-body #p_id').val(p_id);
});
<script>
@endsection
	