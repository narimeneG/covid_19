@extends('layouts.frontend')

@section('titre')
    Accueil
@endsection

@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <!--img src="../user/img/photo/portada-COVID.jpg" alt=""-->
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../user/img/photo/portada-COVID.jpg">
            </div>
        </div>
    </div>
    <!-- section-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- tableau des chiffres -->
                        <div class="single-job-items shadow p-3 mb-5 bg-white rounded">
                            <h4>Dernière mise à jour</h4>
                            <table id="example3" class="table table-hover table-bordered table-striped my-0">
                                <thead>
                                    <tr>
                                        <th>Wilaya</th>
                                        <th class="d-none d-xl-table-cell text-center">Cas</th>
                                        <th class="d-none d-xl-table-cell text-center">Morts</th>
                                        <th class="d-none d-xl-table-cell text-center">Guérie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($stats as $s)
                                    <tr>
                                        <td><a href="{{ url('wilaya/'.$s->w_id.'/stats') }}" class="text-dark">{{ $s->nom }}</a></td>
                                        <td class="d-none d-xl-table-cell text-center">{{ $s->nbrmal }}</td>
                                        <td class="d-none d-xl-table-cell text-center">{{ $s->nbrmort }}</td>
                                        <td class="d-none d-md-table-cell text-center">{{ $s->nbrgue }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                          <!-- cas confirmés -->
                          {!! Charts::scripts() !!}
                        <div class="job-post-details shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Cas confirmés</h4>
                                </div>
                                {!! $donut_mal->html() !!}
							    {!! $donut_mal->script() !!}
                            </div>
                            <div class="post-details1 mb-50">
                                {!! $chart->html() !!}
                                {!! $chart->script() !!}
                            </div>
                        </div>
                        <!-- décés -->
                        <div class="job-post-details shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Cas de décès</h4>
                                </div>
                                {!! $donut_mort->html() !!}
							    {!! $donut_mort->script() !!}
                            </div>
                            <div class="post-details1 mb-50">
                                {!! $chart2->html() !!}
                                {!! $chart2->script() !!}
                            </div>
                        </div>
                        <!-- Guérisons -->
                        <div class="job-post-details shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>cas de récupération</h4>
                                </div>
                                {!! $donut_gue->html() !!}
							    {!! $donut_gue->script() !!}
                            </div>
                            <div class="post-details1 mb-50">
                                {!! $chart3->html() !!}
                                {!! $chart3->script() !!}
                            </div>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-5 col-lg-4">
                        <div class="post-details3  mb-50">
                           <div id="container"></div>
                        </div>
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Vue d'ensemble des cas</h4>
                               <div class="col-xl-12 col-lg-8 row">
                                <div class="col-xl-6 d-inline border-md-right">Nombre total de cas
                                    <p>{{ $nbrmal }} 
                                        <br>+{{ $nvcas }}
                                    </p>
                                </div>
                                <div class="col-xl-3 d-inline border-md-right">Guérisons
                                    <p >{{ $nbrgue }}
                                        <br>+{{ $nvgue }}
                                    </p>
                                </div>
                                <div class="col-xl-3 d-inline">Décès
                                    <p class="text-center">{{ $nbrmort }}
                                        <br>+{{ $nvmort }}
                                    </p>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle white-text text-center">
                                    <span>Apply process</span>
                                    <h2> How it works</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="ccol-xl-8 col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Profile Details</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-0">fffffffffffff</h5>
                                        <div class="text-muted mb-2">ffffffff</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="post-details3  mb-50">
                                    <div class="small-section-tittle">
                                        <h4>Job Overview</h4>
                                    </div>
                                    <ul>
                                        <li>Posted date : <span>12 Aug 2019</span></li>
                                        <li>Location : <span>New York</span></li>
                                        <li>Vacancy : <span>02</span></li>
                                        <li>Job nature : <span>Full time</span></li>
                                        <li>Salary :  <span>$7,800 yearly</span></li>
                                        <li>Application date : <span>12 Sep 2020</span></li>
                                    </ul>
                                    <div class="apply-btn2">
                                        <a href="#" class="btn">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->
                <!-- How  Apply Process End-->
                <!-- Testimonial Start -->  
                

  <!-- JS here -->
  <script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/dz/dz-all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/gb/gb-all.js"></script>
  <script>
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
			color: Highcharts.getOptions().colors[8],
			data: [{
				name: 'Sétif',
				lat: 36.1906035,
				lon: 5.349786
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


<
@endsection