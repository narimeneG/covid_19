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
                        <li class="breadcrumb-item"><a href="{{url('admin/info')}}">Informations</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
					</ol>
				</nav>
			</div>
		</div>
        <!--nouvelle iformation-->
        <div class="row card-footer clearfix">
			<div class="col-10"><strong>Modifier l'information</strong></div>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <form  action="{{ url('admin/pub/'.$info->id) }}" method="POST"  enctype="multipart/form-data">
                            {{method_field('put')}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class='col-md-6'>
                                        <label>titre</label>
                                        <input type="text" class="form-control" name="titre" id="titre" value="{{$info->titre}}" placeholder="titre de l'information">
                                    </div>
                                    <div class='col-md-6'>
                                        <label for="start">Date:</label>
                                        <input type="date" name="date" class="form-control" id="date" value="{{$info->date}}"  min="2020-02-01" max="2022-12-31">
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
                                    <textarea name="contenu" id="contenu" placeholder="Description " value="" class="form-control col-sm-12 rounded" >{{$info->contenu}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Source</label>
                                    <select class="form-control" name="sou_id" id="s_id">
                                        <option value=''></option>
                                        @foreach($sources as $source)
                                            <option value='{{ $source->id }}' {{ $source->id == $info->sou_id ? 'selected' : '' }}>{{ $source->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row">
                                    <label >Lien vidéo</label>
                                    <input type="text" class="form-control" id="lien" value="lien" name="lien" placeholder="le lien">
                                </div>
                                <div class="form-row">
                                    <div class="">
                                        <div class="card-body">
                                            <label for="input-file-now">Photo</label>
                                            <input type="file" id="input-file-now" class="dropify " name="image"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Modifer</button>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
        </div>
	</div>			
 
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('../dist/js/select2.min.js') }}"></script>
		<script type="text/javascript">
			$('.select4-multi').select2();
			$('.select4-multi').select2().val({!! json_encode($info->maladies()->allRelatedIds()) !!}).trigger('change');

            $('.select5-multi').select2();
			$('.select5-multi').select2().val({!! json_encode($info->wilayas()->allRelatedIds()) !!}).trigger('change');

            $('.select6-multi').select2();
			$('.select6-multi').select2().val({!! json_encode($info->pro()->allRelatedIds()) !!}).trigger('change');
		</script>

@endsection

