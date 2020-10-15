@extends('layouts.admin')

    @section('titre')
    AdminKit Demo - show signal Template
    @endsection

@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Signal</strong> Détail</h3>
                </div>
                <div class="col-auto ml-auto text-right mt-n1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/signals')}}">Signals</a></li>
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
                            @if($signal->image)
                                <img width="100%" height="100%" alt="user" src="{{asset('/'.$signal->image)}}">
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
                                        <div class="col-md-3 col-xs-6 b-r"><span class= "badge badge-info"><strong>Adresse</strong></span>
                                            <br>
                                            <p class="text-muted"> {{ $signal->localisation }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <span class= "badge badge-info"><strong>Wilaya</strong></span>
                                            <br>
                                            <p class="text-muted">{{ $signal->wilaya->nom }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <span class= "badge badge-info"><strong>Catégorie</strong></span>
                                            <br>
                                            <p class="text-muted">{{ $signal->categorie->nom }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><span class= "badge badge-info"><strong>Date</strong></span>
                                            <br>
                                            <p class="text-muted"> {{ $signal->date }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><span class= "badge badge-info"><strong>Etat</strong></span>
                                            <br>
                                            <p class="text-muted"> {{ $signal->etat }}</p>
                                        </div>											
                                    </div>										
                                    <hr>
                                    <h4 class="card-title"><span class= "badge badge-info">Déscription </span></h4>
                                    <p class="m-t-30">{{ $signal->contenu }}.</p>
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
			