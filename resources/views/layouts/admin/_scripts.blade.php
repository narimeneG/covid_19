<!--script src="{{ asset('../assets/js/vendor.js') }}"></script-->
<script src="{{ asset('../assets/js/app.js') }}"></script>
<script src="{{ asset('../assets/js/jquery.min.js' )}}"></script>
<script src="{{ asset('../assets/js/Chart.min.js' )}}"></script>
<script src="{{asset('js/app.js')}}"></script>
 <!-- page index-->
	
	<script>
		$(function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: 'pie',
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		$(function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			$("#world_map").vectorMap({
				map: "world_mill",
				normalizeFunction: "polynomial",
				hoverOpacity: .7,
				hoverColor: false,
				regionStyle: {
					initial: {
						fill: "#e3eaef"
					}
				},
				markerStyle: {
					initial: {
						"r": 9,
						"fill": window.theme.primary,
						"fill-opacity": .95,
						"stroke": "#fff",
						"stroke-width": 7,
						"stroke-opacity": .4
					},
					hover: {
						"stroke": "#fff",
						"fill-opacity": 1,
						"stroke-width": 1.5
					}
				},
				backgroundColor: "transparent",
				zoomOnScroll: false,
				markers: [{
						latLng: [31.230391, 121.473701],
						name: "Shanghai"
					},
					{
						latLng: [28.704060, 77.102493],
						name: "Delhi"
					},
					{
						latLng: [6.524379, 3.379206],
						name: "Lagos"
					},
					{
						latLng: [35.689487, 139.691711],
						name: "Tokyo"
					},
					{
						latLng: [23.129110, 113.264381],
						name: "Guangzhou"
					},
					{
						latLng: [40.7127837, -74.0059413],
						name: "New York"
					},
					{
						latLng: [34.052235, -118.243683],
						name: "Los Angeles"
					},
					{
						latLng: [41.878113, -87.629799],
						name: "Chicago"
					},
					{
						latLng: [51.507351, -0.127758],
						name: "London"
					},
					{
						latLng: [40.416775, -3.703790],
						name: "Madrid"
					}
				]
			});
			setTimeout(function() {
				$(window).trigger('resize');
			}, 250)
		});
	</script>
	<script>
		$(function() {
			$('#datetimepicker-dashboard').datetimepicker({
				inline: true,
				sideBySide: false,
				format: 'L'
			});
		});
	</script>
	
	<!-- DataTables -->
<script src="{{ asset('../assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>


<script src="{{ asset('../assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
<script>
	$(document).ready(function() {
		// Basic
		$('.dropify').dropify();

		// Translated
		$('.dropify-fr').dropify({
			messages: {
				default: 'Glissez-déposez un fichier ici ou cliquez',
				replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
				remove: 'Supprimer',
				error: 'Désolé, le fichier trop volumineux'
			}
		});

		// Used events
		var drEvent = $('#input-file-events').dropify();

		drEvent.on('dropify.beforeClear', function(event, element) {
			return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
		});

		drEvent.on('dropify.afterClear', function(event, element) {
			alert('File deleted');
		});

		drEvent.on('dropify.errors', function(event, element) {
			console.log('Has Errors');
		});

		var drDestroy = $('#input-file-to-destroy').dropify();
		drDestroy = drDestroy.data('dropify')
		$('#toggleDropify').on('click', function(e) {
			e.preventDefault();
			if (drDestroy.isDropified()) {
				drDestroy.destroy();
			} else {
				drDestroy.init();
			}
		})
	});
</script>
<script>
