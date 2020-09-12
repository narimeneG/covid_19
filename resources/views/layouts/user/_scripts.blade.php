<!-- JS here -->
        <!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('../user/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('../user/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('../user/js/popper.min.js')}}"></script>
        <script src="{{asset('../user/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('../user/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('../user/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('../user/js/slick.min.js')}}"></script>
        <script src="{{asset('../user/js/price_rangs.js')}}"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('../user/js/wow.min.js')}}"></script>
		<script src="{{asset('../user/js/animated.headline.js')}}"></script>
        <script src="{{asset('../user/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('../user/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{asset('../user/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('../user/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('../user/js/contact.js')}}"></script>
        <script src="{{asset('../user/js/jquery.form.js')}}"></script>
        <script src="{{asset('../user/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('../user/js/mail-script.js')}}"></script>
        <script src="{{asset('../user/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('../user/js/plugins.js')}}"></script>
        <script src="{{asset('../user/js/main.js')}}"></script>

        
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