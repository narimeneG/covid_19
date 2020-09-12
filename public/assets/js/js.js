function addinfo(){
  save_method = "add";
  $('input[name_method]').val('POST');
  $('#modal2').modal('show');
  $('#modal2 form')[0].reset();
  $('.modal-title').text('Nouvelle Information');
  $('.btn-primary').text('ajouter');

}



$(function () {
	$('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
	$('#example2').DataTable({
      "autoWidth": false,
      "responsive": true,
    });
  });

//img file
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