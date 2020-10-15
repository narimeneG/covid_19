@extends('layouts.frontend')

@section('titre')
    Statistique de {{ $wilaya }} 
@endsection

@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('../user/img/photo/portada-COVID.jpg')}}">
                </div>
            </div>
    </div>
    <!-- section-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-xxl-5 d-flex">
                    <div class="w-100"><br><br>
                        <div class="card flex-fill w-100 shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Vue d'ensemble des cas</h5>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-5 border-md-right">Nombre total de cas
                                        <p>{{ $nbrmal }} 
                                            <br>+{{ $nvcas }}
                                        </p>
                                    </div>
                                    <div class="col-md-3 border-md-right">Guérisons
                                        <p >{{ $nbrgue }}
                                            <br>+{{ $nvgue }}
                                        </p>
                                    </div>
                                    <div class="col-md-3">Décès
                                        <p>{{ $nbrmort }}
                                            <br>+{{ $nvmort }}
                                        </p>
                                    </div>
                                </div>
                            </div>					
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-7">
                    <div class="card flex-fill w-100 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title mb-0">Chiffres de {{ $wilaya }}</h5>
                        </div>
                        <div class="card-body py-3">
                            <table class="table table-hover table-bordered table-striped my-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Date</th>
                                        <th class="d-none d-xl-table-cell">Cas</th>
                                        <th class="d-none d-xl-table-cell">Décès</th>
                                        <th class="d-none d-xl-table-cell">Guérisons</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($stats as $s)
                                    <tr class="text-center">
                                        <td>{{ $s->date }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $s->nbrmal }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $s->nbrmort }}</td>
                                        <td class="d-none d-md-table-cell">{{ $s->nbrgue }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>					
                    </div>
                </div>
    </div>

<!-- JS here -->
@endsection


