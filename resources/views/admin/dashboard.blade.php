@extends('layouts.admin')

@section('titre')
	Dashboard | index
@endsection

@section('active1')
	active
@endsection

@section('content')

<div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Statistique</strong> Dashboard</h3>
			</div>
			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ url('admin/statistique') }}">Covid-19</a></li>
						<li class="breadcrumb-item"><a href="{{url('admin/statistique')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Statistique</li>
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
													<h3><i class="fa fa-user text-primary" aria-hidden="true"></i></h3>
													<p class="text-muted">Nombre d'abonnés</p>
												</div>
												<div class="ml-auto">
													<h2 class="counter text-primary">{{ $user }}</h2>
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
													<h3><i class="fa fa-info  text-warning" aria-hidden="true"></i></h3>
													<p class="text-muted ">Nombre publications</p>
												</div>
												<div class="ml-auto">
													<h2 class="counter text-warning">{{ $info }}</h2>
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
													<h3><i class="fa fa-file text-danger" aria-hidden="true"></i></h3>
													<p class="text-muted ">Nombre des idées</p>
												</div>
												<div class="ml-auto">
													<h2 class="counter text-danger">{{ $idée}}</h2>
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
						<div class="col-md-3">
							<div class="card ">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="d-flex no-block align-items-center">
												<div>
													<h3><i class="fa fa-file text-success" aria-hidden="true"></i></h3>
													<p class="text-muted ">Nombre de signals</p>
												</div>
												<div class="ml-auto">
													<h2 class="counter text-success">{{ $signal}}</h2>
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
					</div>
				</div>
			</div>
		</div>
		<!-- stat les cas -->
		<div class="row">
			<div class="col-xl-3 col-xxl-5 d-flex">
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
													<p class="text-muted">Guérisons</p>
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
							<div class="card ">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="d-flex no-block align-items-center">
												<div>
													<h3><i class="fa fa-heartbeat text-warning" aria-hidden="true"></i></h3>
													<p class="text-muted">Nombre total de cas</p>
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
							<div class="card ">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="d-flex no-block align-items-center">
												<div>
													<h3><i class="fa fa-ambulance text-danger" aria-hidden="true"></i></h3>
													<p class="text-muted">Nombre morts</p>
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
							<div class="card ">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="d-flex no-block align-items-center">
												<div>
													<h3><i class="fa fa-users text-primary" aria-hidden="true"></i></h3>
													<p class="text-muted">Nouveux abonnés</p>
												</div>
												<div class="ml-auto">
													<h2 class="counter text-primary">{{ $usernouv }}</h2>
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
						<!--div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Earnings</h5>
												<h1 class="display-5 mt-1 mb-3">$21.300</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Orders</h5>
												<h1 class="display-5 mt-1 mb-3">64</h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
						</div-->
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-body py-3">
						<div class="chart chart-sm">
							<div id="container"></div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<!-- stat les chiffres -->
		<div class="row">
			<div class="col-12 col-lg-6 col-xxl-9 d-flex">
				<div class="card flex-fill">
					<div class="card-body">
						<h5 class="card-title mb-0">Dernière mise à jour</h5><br>
						<table id="example3" class="table table-bordered table-striped my-0">
						<thead>
							<tr class="text-center">
								<th>Wilaya</th>
								<th class="d-none d-xl-table-cell">Cas</th>
								<th class="d-none d-xl-table-cell">Morts</th>
								<th class="d-none d-xl-table-cell">Guérie</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($stats as $s)
							<tr class="text-center">
								<td><a href="{{ url('admin/wilaya/'.$s->w_id.'/stats') }}" class="text-dark">{{ $s->nom }}</a></td>
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
			{!! Charts::scripts() !!}
			<div class="col-12 col-lg-6 col-xxl-3 d-flex">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<h5 class="card-title mb-0">Disque de pourcentage les cas</h5>
					</div>
					<div class="card-body d-flex w-100">
						<div class="align-self-center chart chart-lg">
							{!! $pie_chart->html() !!}
							{!! $pie_chart->script() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- cas confirmé -->
		<div class="row">
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<!--h5 class="card-title mb-0">Recent Movement</h5-->
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							{!! $chart->html() !!}
							{!! $chart->script() !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<!--h5 class="card-title mb-0">Recent Movement</h5-->
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							{!! $donut_mal->html() !!}
							{!! $donut_mal->script() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- décés -->
		<div class="row">
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<!--h5 class="card-title mb-0">Recent Movement</h5-->
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							{!! $chart2->html() !!}
							{!! $chart2->script() !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<!--h5 class="card-title mb-0">Recent Movement</h5-->
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							{!! $donut_mort->html() !!}
							{!! $donut_mort->script() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- guérison -->
		<div class="row">
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<!--h5 class="card-title mb-0">Recent Movement</h5-->
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							{!! $chart3->html() !!}
							{!! $chart3->script() !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<!--h5 class="card-title mb-0">Recent Movement</h5-->
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							{!! $donut_gue->html() !!}
							{!! $donut_gue->script() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<script src="https://code.highcharts.com/mapdata/countries/dz/dz-all.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/gb/gb-all.js"></script>
<script>
	var data = [
		['dz-or', 'Oran'],
		['dz-tl', 'Tlemcen'],
		['dz-og', 'Ouargla'],
		['dz-al', 'Alger'],
		['dz-bj', 'Béjaia'],
		['dz-bl', 'Blida'],
		['dz-1950', 'El Oued'],
		['dz-bs', 'Biskra'],
		['dz-sf', 'Sétif'],
		['dz-bt', 'Batna'],
		['dz-co', 'Constantine'],
	];

	// Create the chart
	/*Highcharts.mapChart('containerr', {
		chart: {
			map: 'countries/dz/dz-all'
		},

		title: {
			text: 'Algéria'
		},

		subtitle: {
			text: '<a href="http://code.highcharts.com/mapdata/countries/dz/dz-all.js"></a>'
		},

		mapNavigation: {
			enabled: true,
			buttonOptions: {
				verticalAlign: 'bottom'
			}
		},
		colorAxis: {
			min: 0
		},

		series: [{
			data: data,
			name: 'les wilayas infectés',
			states: {
				hover: {
					color: '#BADA55'
				}
			},
			dataLabels: {
				enabled: true,
				if(data){
					format: '{point.name}'
				}
				
			}
		}]
	});*/
	Highcharts.mapChart('container', {

		chart: {
			map: 'countries/dz/dz-all'
		},

		title: {
			text: 'Carte des cas (14 derniers jours)'
		},

		mapNavigation: {
			enabled: true
		},

		tooltip: {
			headerFormat: '',
			pointFormat: '<b>{point.name}</b>'
		},

		series: [{
			// Use the gb-all map with no data as a basemap
			name: 'Basemap',
			borderColor: '#A0A0A0',
			nullColor: 'rgba(200, 200, 200, 0.3)',
			showInLegend: false
		}, {
			name: 'Separators',
			type: 'mapline',
			nullColor: '#707070',
			showInLegend: false,
			enableMouseTracking: false
		}, {
			// Specify points using lat/lon
			type: 'mappoint',
			name: 'Wilaya',
			color: Highcharts.getOptions().colors[3],
			data: [{
				name: 'Sétif',
				lat: 36.190742,
				lon: 5.3497862
			},{
				name: 'Béjaïa',
				lat: 36.7701889,
				lon: 4.9369383
			}
			,{
				name: 'Alger',
				lat: 36.7538345,
				lon: 3.0534636
			}
			,{
				name: 'Blida',
				lat: 36.4813233,
				lon: 2.7651712
			},{
				name: 'Oran',
				lat: 35.725521,
				lon: -0.7082328
			},{
				name: 'Constantine',
				lat: 36.3547223,
				lon: 6.5053097
			},{
				name: 'Batna',
				lat: 35.5772793,
				lon: 6.1060897
			},{
				name: 'Ouargla',
				lat: 32.1805293,
				lon: 4.6419527
			},{
				name: 'Biskra',
				lat: 34.8468563,
				lon: 5.6535206
			},{
				name: 'Tlemcen',
				lat: 34.8973038,
				lon: -1.3852009
			},{
				name: 'El Oued',
				lat: 33.3565892,
				lon: 6.7890126
			}
			]
		}]
	});
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

<script src="{{asset('js/app.js')}}"></script>

@endsection
