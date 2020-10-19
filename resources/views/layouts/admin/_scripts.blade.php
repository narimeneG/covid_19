<!--script src="{{ asset('../assets/js/vendor.js') }}"></script-->
<script src="{{ asset('../assets/js/app.js') }}"></script>
<script src="{{ asset('../assets/js/jquery.min.js' )}}"></script>
<script src="{{ asset('../assets/js/Chart.min.js' )}}"></script>
<script src="{{asset('js/app.js')}}"></script>
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
