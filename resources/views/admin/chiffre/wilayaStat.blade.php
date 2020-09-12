@extends('layouts.admin')

@section('titre')
	Statistique de {{ $wilaya }} 
@endsection

@section('content')

<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{ $wilaya }}</strong> Statistique</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/chiffres') }}">Chiffres</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $wilaya }} Stats</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- stat les donneés -->
    <div class="row">
        <div class="col-xl-12 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-heartbeat text-primary" aria-hidden="true"></i></h3>
                                                <p class="text-muted">Nombre dans REA</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-primary">0</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-heartbeat text-warning" aria-hidden="true"></i></h3>
                                                <p class="text-muted ">Nombre total de cas</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-warning">{{ $nbrmal }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-users text-success" aria-hidden="true"></i></h3>
                                                <p class="text-muted ">Nombre Guérisons</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-success">{{ $nbrgue }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-ambulance text-danger" aria-hidden="true"></i></h3>
                                                <p class="text-muted ">Nombre Décès</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-danger">{{ $nbrmort }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- stat les cas -->
    <div class="row">
        <div class="col-xl-4 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-users text-success" aria-hidden="true"></i></h3>
                                                <p class="text-muted">Nouveaux guéris</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-success">{{ $nvgue }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-heartbeat text-warning" aria-hidden="true"></i></h3>
                                                <p class="text-muted">nouveaux cas confirmés</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-warning">{{ $nvcas}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-ambulance text-danger" aria-hidden="true"></i></h3>
                                                <p class="text-muted">nouveaux décès</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-danger">{{ $nvmort }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="fa fa-users text-primary" aria-hidden="true"></i></h3>
                                                <p class="text-muted">Nouveux abonnés</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-primary">nbr</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-xxl-7">
            <br>
            <div class="card flex-fill w-100">
                <div class="card-header">
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
    <!-- stat les diagramme -->
    <div class="row">
        <div class="col-12 col-lg-6 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Les malades {{ $wilaya }}</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                    {!! $linemal->html() !!}
                    </div>
                    {!! Charts::scripts() !!}
		            {!! $linemal->script() !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Les malades {{ $wilaya }}</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                    {!! $barmal->html() !!}
                    </div>
                    {!! Charts::scripts() !!}
		{!! $barmal->script() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Les morts {{ $wilaya }}</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        {!! $linemort->html() !!}
                    </div>
                    {!! Charts::scripts() !!}
		            {!! $linemort->script() !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Les morts {{ $wilaya }}</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        {!! $barmort->html() !!}
                    </div>
                    {!! Charts::scripts() !!}
		            {!! $barmort->script() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-12 col-lg-6 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Les guéris {{ $wilaya }}</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        {!! $linegue->html() !!}
                    </div>
                    {!! Charts::scripts() !!}
		            {!! $linegue->script() !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Les gueris {{ $wilaya }}</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        {!! $bargue->html() !!}
                    </div>
                    {!! Charts::scripts() !!}
		            {!! $bargue->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection
