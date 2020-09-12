@extends('layouts.frontend')

@section('titre')
    Profile {{ $user->nom }} {{ $user->prenom }}
@endsection

@section('content')
    <!-- section-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body text-center">
                            @if($user->image)
                                <img src="{{asset('/'.$user->image)}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            @else 
                                <img src="{{asset('frontend/images/avatar.jpeg')}}" class="rounded-circle mr-2" alt="Avatar" width="128" height="128"/>
                            @endif 
                            <h5 class="card-title mb-0">{{ $user->nom }} {{ $user->prenom }}</h5>
                            <div class="text-muted mb-2">{{ $user->prof->nom }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Détails personnel</h5>
                        </div>
                        <div class="tab-content">       
                            <!--second tab-->
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Maladie</strong>
                                            <br>
                                            <p class="text-muted">
                                            @foreach($user-> maladies as $m)
                                                {{ $m->nom }}&nbsp;
                                            @endforeach</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Wilaya</strong>
                                            <br>
                                            <p class="text-muted"> {{ $wilaya }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Commune</strong>
                                            <br>
                                            <p class="text-muted">{{ $user->commune->nom }}</p>
                                        </div>
                                    </div>		
                                </div>
                            </div>								   
                        </div>
                    </div>
                </div>

  <!-- JS here -->
   
@endsection