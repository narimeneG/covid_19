@extends('layouts.admin')

@section('titre')
AdminKit Demo - iformations Template
@endsection

@section('active2')
	active
@endsection

@section('content')

<!-- content main-->
	<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Informations</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Informations</li>
					</ol>
				</nav>
			</div>
		</div>
        <!--nouvelle iformation-->
        <div class="row card-footer clearfix">
			<div class="col-10"><strong>Les informations</strong></div>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal1" ><i class="fas fa-plus"></i> Ajouter</button>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
				<div class="card-body">
					<table id="example3" class="table table-bordered ">
						<thead>
							<tr style="text-align: center;">
								<th style="width:2%;">id</th>
								<th style="width:10%;">titre</th>
								<th style="width:5%;">Wilayas</th>
								<th style="width:5%;">Maladies</th>
								<th style="width:10%;">Proffesions</th>
								<th style="width:5%;">Source</th>	
								<th style="width:15%">Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($infos as $info)
							<tr style="text-align: center;">
								<td>{{ $info->id }}</td>
								<td>{{ $info->titre }}</td>
								<td>
                                    @foreach($info-> wilayas as $w)
										{{ $w->nom }}&nbsp;
									@endforeach
                                </td>
								<td>
                                    @foreach($info-> maladies as $m)
										{{ $m->nom }}&nbsp;
									@endforeach
                                </td>
                                <td>
                                    @foreach($info-> pro as $p)
										{{ $p->nom }}&nbsp;
									@endforeach
                                </td>
                                @if($info->sou_id != null) <td><a href="{{ url('admin/infoSource/'.$info->sou_id.'/show') }}"  class="text-dark">{{$info->source->nom}}</a></td> @else <td></td> @endif
								<td class="table-action">
									<button class="btn btn-info m-0" ><a href="{{url('admin/pub/'.$info->id.'/show')}}"><i class="align-middle text-white" data-feather="eye"></i></a></button>
									<button class="btn btn-warning m-0" data-infoid="{{ $info->id }}" data-titre="{{ $info->titre }}" data-cont="{{ $info->contenu }}" data-sid="{{ $info->sou_id }}" data-pid="{{ $info->pro }}" data-lien="{{ $info->lien }}" data-date="{{ $info->date }}"  data-toggle="modal" data-target="#modal2"><i class="align-middle" data-feather="edit-2"></i></button>
									<button class="btn btn-danger m-0" data-infoid="{{ $info->id }}" data-toggle="modal" data-target="#modal3"><i class="align-middle" data-feather="trash-2"></i></button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
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
            <form action="{{ route('admin/info')}}"  method="POST">
                {{csrf_field()}} 
                <div class="modal-body">
                    <div class="form-row">
                        <div class='col-md-6'>
                            <label>titre</label>
                            <input type="text" class="form-control {{$errors->has('titre') ? 'is-invalid' : ''}}" name="titre" id="titre" placeholder="titre de l'information">
                            @if($errors->has('titre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titre')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class='col-md-6'>
                            <label for="start">Date:</label>
                            <input type="date" name="date" class="form-control" id="date" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
                        </div>			
                    </div>       
                    <div class="form-group">
                        <label>Maladies</label><br>
                        <select class="form-control select2-multi" style="width: 100%"  name="mal_id[]" multiple="multiple">
                            @foreach($maladies as $mal)
                                <option value='{{ $mal->id }}'>{{ $mal->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Wilayas</label><br>
                        <select class="form-control select1-multi" style="width: 100%" name="wilaya_id[]" multiple="multiple">   
                            @foreach($wilayas as $wil)
                                <option value='{{ $wil->id }}'>{{ $wil->nom }}</option>
                            @endforeach      
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profession</label><br>
                        <select class="form-control select3-multi" style="width: 100%" name="pro_id[]" id="p_id" multiple="multiple">
                            @foreach($professions as $pro)
                                <option value='{{ $pro->id }}'>{{ $pro->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label >Contenu</label>
                        <textarea name="contenu" id="contenu" placeholder="Description "  class="form-control col-sm-12 rounded {{$errors->has('contenu') ? 'is-invalid' : ''}}" ></textarea>
                           @if($errors->has('contenu'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contenu')}}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Source</label>
                        <select class="form-control {{$errors->has('sou_id') ? 'is-invalid' : ''}}" name="sou_id" id="s_id">
                            @foreach($sources as $source)
                                <option value='{{ $source->id }}'>{{ $source->nom }}</option>
                            @endforeach
                            @if($errors->has('sou_id'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('sou_id')}}</strong>
									</span>
								@endif
                        </select>
                    </div>
                    <div class="form-row">
                        <label >Lien vidéo</label>
                        <input type="text" class="form-control {{$errors->has('lien') ? 'is-invalid' : ''}}" id="lien" name="lien" placeholder="le lien">
                        @if($errors->has('lien'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lien')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="">
                            <div class="card-body">
                                <label for="input-file-now">Photo</label>
                                <input type="file" id="input-file-now" class="dropify  {{$errors->has('image') ? 'is-invalid' : ''}}" name="image"/>
                                @if($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image')}}</strong>
                                    </span>
                                    @endif
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
 
<!-- Modal update -->
<div id="modal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert-warning">
                <h5 class="modal-title">Modifier la publication</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  action="{{ route('admin/info')}}" method="post"  enctype="multipart/form-data">
                {{method_field('put')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="info_id" id="info_id" value="">
                    <div class="form-row">
                        <div class='col-md-6'>
                            <label>titre</label>
                            <input type="text" class="form-control {{$errors->has('titre') ? 'is-invalid' : ''}}" name="titre" id="titre" placeholder="titre de l'information">
                            @if($errors->has('titre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titre')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class='col-md-6'>
                            <label for="start">Date:</label>
                            <input type="date" name="date" class="form-control" id="date" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
                        </div>			
                    </div>       
                    <div class="form-group">
                        <label>Maladies</label><br>
                        <select class="form-control select4-multi" style="width: 100%" name="mal_id[]" multiple="multiple">
                            @foreach($maladies as $mal)
                                <option value='{{ $mal->id }}'>{{ $mal->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Wilayas</label><br>
                        <select class="form-control select5-multi" style="width: 100%" name="wilaya_id[]" multiple="multiple">   
                            @foreach($wilayas as $wil)
                                <option value='{{ $wil->id }}'>{{ $wil->nom }}</option>
                            @endforeach      
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profession</label><br>
                        <select class="form-control select6-multi" style="width: 100%" name="pro_id[]" id="p_id" multiple="multiple">
                            @foreach($professions as $pro)
                                <option value='{{ $pro->id }}'>{{ $pro->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label >Contenu</label>
                        <textarea name="contenu" id="contenu" placeholder="Description "  class="form-control col-sm-12 rounded {{$errors->has('contenu') ? 'is-invalid' : ''}}" ></textarea>
                           @if($errors->has('contenu'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contenu')}}</strong>
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Source</label>
                        <select class="form-control {{$errors->has('sou_id') ? 'is-invalid' : ''}}" name="sou_id" id="s_id">
                            <option value=''></option>
                            @foreach($sources as $source)
                                <option value='{{ $source->id }}'>{{ $source->nom }}</option>
                            @endforeach
                            @if($errors->has('sou_id'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('sou_id')}}</strong>
									</span>
								@endif
                        </select>
                    </div>
                    <div class="form-row">
                        <label >Lien vidéo</label>
                        <input type="text" class="form-control {{$errors->has('lien') ? 'is-invalid' : ''}}"" id="lien" name="lien" placeholder="le lien">
                        @if($errors->has('lien'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lien')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="">
                            <div class="card-body">
                                <label for="input-file-now">Photo</label>
                                <input type="file" id="input-file-now" class="dropify  {{$errors->has('image') ? 'is-invalid' : ''}}" name="image"/>
                            </div>
                            @if($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image')}}</strong>
                                </span>
                            @endif
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

<!-- Modal suppression -->
<div id="modal3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header alert-danger">
                    <h4 class="modal-title">supprimer la publucation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('admin/info')}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <div class="modal-body">
                    <p>supprimer ........</p>
                    <input type="hidden" name="info_id" id="info_id" value="">		
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
<script src="{{ asset('../dist/js/parsley.min.js') }}"></script>
<script src="{{ asset('../dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select1-multi').select2();
    $('.select3-multi').select2();

    $('.select4-multi').select2();
    
    $('.select5-multi').select2();
    $('.select6-multi').select2();
    
    $('#modal2').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) 
		var title = button.data('titre') 
		var contenu = button.data('cont') 
		var info_id = button.data('infoid') 
        var s_id = button.data('sid') 
        var date = button.data('date')
		var w_id = button.data('wid') 
		var m_id = button.data('mid') 
		var p_id = button.data('pid') 
		var lien = button.data('lien')
        alert(p_id)
        
		var modal = $(this)
		modal.find('.modal-body #titre').val(title);
		modal.find('.modal-body #info_id').val(info_id);
        modal.find('.modal-body #contenu').val(contenu);
        modal.find('.modal-body #date').val(date);
		modal.find('.modal-body #lien').val(lien);
		modal.find('.modal-body #s_id').val(s_id);
		modal.find('.modal-body #w_id').val(w_id);
		modal.find('.modal-body #m_id').val(m_id);
		modal.find('.modal-body #p_id').val(p_id);
			
    })
    $('#modal3').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) 
        var i_id = button.data('infoid') 
        
        var modal = $(this)
        modal.find('.modal-body #info_id').val(i_id);
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

