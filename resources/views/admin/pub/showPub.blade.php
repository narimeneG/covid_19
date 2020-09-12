@extends('layouts.admin')
@section('titre')
	AdminKit Demo - show information Template
@endsection

@section('content')
	<div class="page-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Idée</strong> Détail</h3>
                </div>
                <div class="col-auto ml-auto text-right mt-n1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/info')}}">informations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Détail</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="user-bg"> 
                            @if($info->image)
                                <img width="100%" height="100%" alt="user" src="{{asset('/'.$info->image)}}">
                            @else 
                                <img src="{{asset('frontend/images/pdp.png')}}" width="100%" height="100%" alt="user"/>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Détail</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--second tab-->
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 b-r"><span class= "badge badge-info"><strong class= "badge badge-info">titre</strong></span>
                                            <br>
                                            <p class="text-muted"> {{ $info->titre }} </p>
																				</div>
																				<div class="col-md-6 col-xs-6 b-r"><span class= "badge badge-info"><strong>maladie </strong></span>
                                            <br>
                                            @if($info->mal_id != null)<p class="text-muted">{{ $info->maladie->nom }}</p>@else<p class="text-muted">tous les maladis</p>@endif
																				</div>
																				<div class="col-md-6 col-xs-6 b-r"><span class= "badge badge-info"><strong>wilayas </strong></span>
                                            <br>
                                            @if($info->wilaya_id != null)<p class="text-muted">{{ $info->wilaya->nom }}</p>@else<p class="text-muted">tous les maladis</p>@endif
																				</div>
																				<div class="col-md-6 col-xs-6 b-r"><span class= "badge badge-info"><strong>profession </strong></span>
                                            <br>
                                            @if($info->pro_id != null)<p class="text-muted">{{ $info->pro->nom }}</p>@else<p class="text-muted">tous les wilayas</p>@endif
                                        </div>
                                        <div class="col-md-6 col-xs-6 b-r"><span class= "badge badge-info"><strong>source </strong></span>
                                            <br>
                                            @if($info->sou_id != null)<p class="text-muted">{{ $info->source->nom }}</p>@else<p class="text-muted">aucune</p>@endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row"> 
                                        <div class="col-md-12 col-xs-6"> <br>
                                            <h4 class="card-title"><span >contenu </span></h4>
                                            <p class="text-muted"> {{ $info->contenu }} </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>	
@endsection		